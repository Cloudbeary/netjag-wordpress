# NetJag WordPress Site - Vercel + PlanetScale Migration

This repository contains the migrated WordPress site for NetJag.co.za, optimized for deployment on Vercel with PlanetScale as the database backend.

## 🚀 Quick Start

### Prerequisites
- Node.js 16+ 
- Git
- PlanetScale CLI
- Vercel CLI (optional)

### Local Development
```bash
# Clone the repository
git clone <your-repo-url>
cd netjag-wordpress

# Install dependencies
npm install

# Copy environment file
cp .env.example .env.local

# Configure your environment variables
# Edit .env.local with your PlanetScale credentials

# Start local development
npm run dev
```

## 📁 Project Structure

```
├── public_html/                 # WordPress core files
│   ├── wp-admin/               # WordPress admin
│   ├── wp-content/             # Themes, plugins, uploads
│   │   ├── themes/listingpro/  # Active theme
│   │   ├── plugins/            # WordPress plugins
│   │   └── uploads/            # Media files
│   ├── wp-includes/            # WordPress core includes
│   └── index.php               # WordPress entry point
├── vercel.json                 # Vercel configuration
├── package.json                # Node.js dependencies
├── wp-config-vercel.php        # Production WordPress config
├── .env.example                # Environment variables template
├── DATABASE_MIGRATION.md       # Database migration guide
├── MIGRATION_CHECKLIST.md      # Complete migration checklist
└── README.md                   # This file
```

## 🎨 Theme & Features

### Active Theme: ListingPro v2.9.6
- **Type**: Directory/Listing theme
- **Features**: Multi-purpose directory listings
- **Author**: CridioStudio
- **License**: GPL v3

### Key Plugins
- **ListingPro Plugin**: Core functionality
- **Elementor**: Page builder
- **WPForms Lite**: Contact forms
- **WP Mail SMTP**: Email delivery
- **All-in-One SEO Pack**: SEO optimization
- **CubeWP Framework**: Custom post types

## 🗄️ Database Information

### Original Database
- **Name**: u756990857_vWo3d
- **Tables**: 32 total
- **Posts**: 437 posts/pages
- **Users**: Multiple user accounts
- **Custom Tables**: ListingPro, WPForms, Action Scheduler

### Migration Target
- **Platform**: PlanetScale
- **Database**: netjag-wordpress
- **Charset**: utf8mb4
- **Collation**: utf8mb4_unicode_ci

## 🔧 Configuration

### Environment Variables
Required environment variables for production:

```env
# Database
DB_NAME=netjag-wordpress
DB_USER=your_planetscale_username
DB_PASSWORD=your_planetscale_password
DB_HOST=your_planetscale_host.psdb.cloud

# WordPress URLs
WP_HOME=https://your-vercel-domain.vercel.app
WP_SITEURL=https://your-vercel-domain.vercel.app

# Security Keys (generate new ones)
AUTH_KEY=your_auth_key
SECURE_AUTH_KEY=your_secure_auth_key
LOGGED_IN_KEY=your_logged_in_key
NONCE_KEY=your_nonce_key
AUTH_SALT=your_auth_salt
SECURE_AUTH_SALT=your_secure_auth_salt
LOGGED_IN_SALT=your_logged_in_salt
NONCE_SALT=your_nonce_salt
WP_CACHE_KEY_SALT=your_cache_key_salt
```

### Vercel Configuration
The `vercel.json` file is configured for:
- PHP 8.1 runtime
- WordPress routing
- Environment variable mapping
- Static asset serving

## 📋 Migration Steps

### 1. Database Migration
Follow the detailed guide in `DATABASE_MIGRATION.md`:
1. Set up PlanetScale database
2. Clean and import SQL dump
3. Update WordPress URLs
4. Deploy to production

### 2. Vercel Deployment
1. Connect repository to Vercel
2. Configure environment variables
3. Deploy and test

### 3. Verification
Use the comprehensive checklist in `MIGRATION_CHECKLIST.md` to verify:
- Core functionality
- Theme and plugins
- Content integrity
- Performance
- Security

## 🛠️ Development Commands

```bash
# Local development
npm run dev

# Build for production
npm run build

# Deploy to Vercel
npm run deploy

# Database migration (manual)
npm run db:migrate
```

## 🔒 Security Features

- HTTPS enforced
- File editing disabled in admin
- Strong database passwords
- Environment-based configuration
- Secure authentication keys

## 📊 Performance Optimizations

- Vercel edge caching
- Optimized PHP runtime
- Database connection pooling
- Static asset optimization
- WordPress caching enabled

## 🚨 Troubleshooting

### Common Issues

1. **Database Connection Errors**
   - Verify PlanetScale credentials
   - Check SSL configuration
   - Confirm database name

2. **File Upload Issues**
   - Check file permissions
   - Verify upload directory
   - Review max file size limits

3. **Plugin Conflicts**
   - Deactivate plugins individually
   - Check error logs
   - Verify compatibility

### Debug Mode
To enable debug mode, set in environment:
```env
WP_DEBUG=true
WP_DEBUG_LOG=true
WP_DEBUG_DISPLAY=false
```

## 📈 Monitoring

### Recommended Monitoring
- Vercel Analytics
- PlanetScale Insights
- WordPress health checks
- Uptime monitoring
- Performance tracking

### Key Metrics
- Page load time < 3 seconds
- Database response time < 100ms
- 99.9% uptime target
- Core Web Vitals optimization

## 🔄 Backup Strategy

### Automated Backups
- PlanetScale: Daily automated backups
- Vercel: Deployment history
- Git: Version control

### Manual Backups
- Database exports via PlanetScale CLI
- File system snapshots
- Configuration backups

## 📞 Support

### Documentation
- `DATABASE_MIGRATION.md`: Database setup guide
- `MIGRATION_CHECKLIST.md`: Complete migration steps
- `.env.example`: Environment configuration

### External Resources
- [Vercel Documentation](https://vercel.com/docs)
- [PlanetScale Documentation](https://docs.planetscale.com)
- [WordPress Codex](https://codex.wordpress.org)

## 📄 License

This project maintains the original WordPress GPL v3 license. The ListingPro theme is licensed separately.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make changes
4. Test thoroughly
5. Submit a pull request

## 📝 Changelog

### v1.0.0 - Initial Migration
- Migrated from traditional hosting to Vercel
- Database moved to PlanetScale
- Optimized for serverless environment
- Security enhancements implemented
- Performance optimizations added

---

**Original Site**: https://netjag.co.za  
**New Site**: https://your-vercel-domain.vercel.app  
**Migration Date**: [Date]  
**Status**: ✅ Ready for deployment