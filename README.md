# NetJag.co.za - WordPress Website

A professional WordPress website for NetJag, featuring directory listings, contact forms, and modern design.

## 🚀 Quick Start

### Prerequisites
- PHP 7.2.24+ (8.1+ recommended)
- MySQL 5.7+ or MariaDB 10.3+
- Web server with PHP support

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd netjag.co.za
   ```

2. **Set up the database**
   - Create a MySQL/MariaDB database with UTF8MB4 support
   - Import the database backup (contact admin for SQL file)
   - Update database credentials in wp-config.php

3. **Configure WordPress**
   - Copy `wp-config-template.php` to `wp-config.php`
   - Update database credentials and site URLs
   - Generate new security keys at https://api.wordpress.org/secret-key/1.1/salt/

4. **Set file permissions**
   ```bash
   chmod 755 wp-content/
   chmod 644 wp-config.php
   ```

## 🏗️ Architecture

### Core Components
- **WordPress Core**: Latest version with security updates
- **Theme**: ListingPro (custom directory theme)
- **Database**: MySQL with UTF8MB4 encoding

### Key Plugins
- **Elementor**: Page builder for custom layouts
- **WPForms Lite**: Contact and lead generation forms
- **All-in-One SEO Pack**: Search engine optimization
- **WP Mail SMTP**: Reliable email delivery
- **All-in-One WP Migration**: Backup and migration tools

### File Structure
```
public_html/
├── wp-admin/           # WordPress admin interface
├── wp-content/         # Themes, plugins, uploads
│   ├── themes/         # ListingPro and default themes
│   ├── plugins/        # Active plugins
│   ├── uploads/        # Media files
│   └── mu-plugins/     # Must-use plugins
├── wp-includes/        # WordPress core files
├── wp-config.php       # Configuration file
├── index.php           # Main entry point
└── .htaccess           # URL rewriting rules
```

## 🔧 Configuration

### Environment Variables
Set these in your hosting platform:

```env
# Database Configuration
DB_NAME=your_database_name
DB_USER=your_database_user
DB_PASSWORD=your_database_password
DB_HOST=your_database_host

# Site URLs
WP_HOME=https://netjag.co.za
WP_SITEURL=https://netjag.co.za

# Security Keys (generate new ones)
AUTH_KEY=your_auth_key
SECURE_AUTH_KEY=your_secure_auth_key
LOGGED_IN_KEY=your_logged_in_key
NONCE_KEY=your_nonce_key
AUTH_SALT=your_auth_salt
SECURE_AUTH_SALT=your_secure_auth_salt
LOGGED_IN_SALT=your_logged_in_salt
NONCE_SALT=your_nonce_salt

# Debug Settings (set to false in production)
WP_DEBUG=false
WP_DEBUG_LOG=false
WP_DEBUG_DISPLAY=false
```

### Server Requirements
- **PHP Version**: 7.2.24 minimum, 8.1+ recommended
- **Memory Limit**: 256MB minimum, 512MB recommended
- **Max Execution Time**: 300 seconds
- **Upload Limit**: 64MB
- **Required Extensions**: mysqli, gd, curl, mbstring, xml, zip, json

## 🚀 Deployment

### Supported Platforms
- **Traditional PHP Hosting**: cPanel, Plesk, DirectAdmin
- **Cloud Platforms**: DigitalOcean, AWS, Google Cloud
- **Managed WordPress**: WP Engine, Kinsta, SiteGround

### Deployment Steps
1. Set up hosting environment with PHP and MySQL
2. Upload files maintaining directory structure
3. Import database with UTF8MB4 encoding
4. Configure wp-config.php with new credentials
5. Update site URLs in database
6. Test functionality and SSL certificate

### Database Migration
```sql
-- Update site URLs after migration
UPDATE wp_options SET option_value = 'https://netjag.co.za' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://netjag.co.za' WHERE option_name = 'siteurl';
```

## 🔒 Security

### Best Practices
- Keep WordPress core and plugins updated
- Use strong passwords and 2FA
- Regular backups
- Security monitoring
- SSL certificate
- Firewall protection

### Sensitive Files
- `wp-config.php` - Contains database credentials
- `.htaccess` - Server configuration
- `wp-content/uploads/` - May contain sensitive files

## 🛠️ Development

### Local Development
1. Set up local LAMP/WAMP/MAMP stack
2. Import database and files
3. Update wp-config.php for local environment
4. Enable debug mode for development

### Plugin Development
- Follow WordPress coding standards
- Use proper hooks and filters
- Test with debug mode enabled
- Document custom functionality

## 📊 Features

### Directory Listings
- Business directory functionality via ListingPro theme
- Advanced search and filtering
- User submissions and management
- Review and rating system

### Contact Forms
- Multiple contact forms via WPForms
- Lead capture and management
- Email notifications
- Spam protection

### SEO Optimization
- All-in-One SEO Pack configuration
- Meta tags and descriptions
- XML sitemaps
- Social media integration

## 🐛 Troubleshooting

### Common Issues
1. **White Screen of Death**: Check error logs, increase memory limit
2. **Database Connection Error**: Verify credentials in wp-config.php
3. **Plugin Conflicts**: Deactivate plugins one by one to identify issues
4. **Permission Errors**: Set correct file permissions (755/644)

### Debug Mode
Enable in wp-config.php for troubleshooting:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

## 📞 Support

For technical support or questions about this WordPress installation:
- Check WordPress documentation: https://wordpress.org/support/
- Review plugin documentation for specific features
- Contact hosting provider for server-related issues

## 📄 License

This WordPress installation includes:
- WordPress Core (GPL v2 or later)
- Various plugins (see individual plugin licenses)
- Custom theme and content (proprietary)

---

**Last Updated**: January 2025  
**WordPress Version**: Latest  
**PHP Version**: 7.2.24+