# Database Migration Guide: WordPress to Neon

This guide will help you migrate your WordPress database from the SQL dump to Neon PostgreSQL.

## Prerequisites

1. Neon account (free tier available)
2. Neon CLI installed
3. PostgreSQL client or pgAdmin access
4. The SQL dump file: `u756990857_vWo3d.sql`

## Step 1: Set Up PlanetScale Database

### 1.1 Create a New Database
```bash
# Install PlanetScale CLI
npm install -g @planetscale/cli

# Login to PlanetScale
pscale auth login

# Create a new database
pscale database create netjag-wordpress --region us-east
```

### 1.2 Create a Development Branch
```bash
# Create a development branch for schema changes
pscale branch create netjag-wordpress dev
```

## Step 2: Prepare the SQL Dump

### 2.1 Clean the SQL Dump
The current SQL dump contains some MySQL-specific features that need to be modified for PlanetScale:

1. **Remove MySQL-specific comments**: PlanetScale doesn't support some MySQL extensions
2. **Update charset**: Ensure all tables use `utf8mb4`
3. **Remove foreign key constraints**: PlanetScale handles these differently

### 2.2 Required Modifications

Create a cleaned version of the SQL dump:

```sql
-- Remove these lines from the SQL dump:
/*M!999999\- enable the sandbox mode */
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

-- And the corresponding restoration lines at the end
```

## Step 3: Import to PlanetScale

### 3.1 Connect to PlanetScale
```bash
# Create a connection to your dev branch
pscale connect netjag-wordpress dev --port 3309
```

### 3.2 Import the Database
```bash
# Import the cleaned SQL dump
mysql -h 127.0.0.1 -P 3309 -u root < u756990857_vWo3d_cleaned.sql
```

### 3.3 Verify the Import
```bash
# Connect to verify tables were created
pscale shell netjag-wordpress dev

# Check tables
SHOW TABLES;

# Verify key tables have data
SELECT COUNT(*) FROM wp_posts;
SELECT COUNT(*) FROM wp_users;
SELECT COUNT(*) FROM wp_options;
```

## Step 4: Update WordPress URLs

### 4.1 Update Site URLs in Database
```sql
-- Connect to PlanetScale shell
pscale shell netjag-wordpress dev

-- Update site URLs (replace with your Vercel domain)
UPDATE wp_options SET option_value = 'https://your-vercel-domain.vercel.app' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://your-vercel-domain.vercel.app' WHERE option_name = 'siteurl';

-- Update any hardcoded URLs in post content (optional)
UPDATE wp_posts SET post_content = REPLACE(post_content, 'https://netjag.co.za', 'https://your-vercel-domain.vercel.app');
```

## Step 5: Deploy Schema to Production

### 5.1 Create Deploy Request
```bash
# Create a deploy request to push changes to main branch
pscale deploy-request create netjag-wordpress dev

# List deploy requests to get the number
pscale deploy-request list netjag-wordpress

# Deploy the changes
pscale deploy-request deploy netjag-wordpress <deploy-request-number>
```

### 5.2 Get Production Connection Details
```bash
# Create a production password
pscale password create netjag-wordpress main wordpress-app

# This will output:
# - Database: netjag-wordpress
# - Username: [generated username]
# - Password: [generated password]
# - Host: [planetscale host]
```

## Step 6: Configure Environment Variables

Add these to your Vercel environment variables:

```
DB_NAME=netjag-wordpress
DB_USER=[username from step 5.2]
DB_PASSWORD=[password from step 5.2]
DB_HOST=[host from step 5.2]
WP_HOME=https://your-vercel-domain.vercel.app
WP_SITEURL=https://your-vercel-domain.vercel.app
```

## Important Database Tables

Your WordPress installation includes these key tables:

- **wp_posts**: 437 posts/pages
- **wp_users**: User accounts
- **wp_options**: Site configuration
- **wp_postmeta**: Post metadata
- **wp_usermeta**: User metadata
- **wp_terms**: Categories and tags
- **wp_term_taxonomy**: Taxonomy definitions
- **wp_term_relationships**: Post-term relationships

## Custom Tables (Plugin-specific)

The database also includes custom tables from plugins:
- `wp_actionscheduler_*`: Action Scheduler (WooCommerce/background tasks)
- `wp_cube_relationships`: CubeWP plugin
- `wp_cwp_forms_leads`: CubeWP Forms
- `wp_listing_stats_*`: ListingPro theme statistics
- `wp_social_users`: Social login plugin
- `wp_wpforms_*`: WPForms plugin data

## Troubleshooting

### Common Issues:

1. **Connection Timeout**: Increase timeout in wp-config.php
2. **SSL Issues**: Ensure SSL is properly configured
3. **Character Encoding**: Verify utf8mb4 is used throughout
4. **Large Import**: Split the SQL file if it's too large

### Verification Queries:

```sql
-- Check WordPress version
SELECT option_value FROM wp_options WHERE option_name = 'db_version';

-- Check active theme
SELECT option_value FROM wp_options WHERE option_name = 'template';

-- Check active plugins
SELECT option_value FROM wp_options WHERE option_name = 'active_plugins';
```

## Next Steps

After successful database migration:
1. Test the site functionality
2. Update any remaining hardcoded URLs
3. Configure WordPress cron alternatives
4. Set up monitoring and backups
5. Test all plugins and theme functionality