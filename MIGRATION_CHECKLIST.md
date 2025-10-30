# WordPress to Vercel + Neon Migration Checklist

## Pre-Migration Preparation ✅

- [x] **Backup Analysis Complete**
  - WordPress core files identified
  - ListingPro theme (v2.9.6) and plugins catalogued
  - Database structure analyzed (32 tables, 437 posts)
  - Original site: https://netjag.co.za

- [x] **File Cleanup Complete**
  - Removed debug.log files
  - Removed backup directories (ai1wm-backups, upgrade-temp-backup)
  - Removed licensing logs
  - Cleaned non-essential files

- [x] **Configuration Files Created**
  - vercel.json for Vercel deployment
  - package.json for project management
  - wp-config-vercel.php for production
  - .env.example for environment variables
  - .gitignore for version control

## Database Migration Steps

### 1. PlanetScale Setup
- [ ] Create PlanetScale account
- [ ] Install PlanetScale CLI: `npm install -g @planetscale/cli`
- [ ] Login: `pscale auth login`
- [ ] Create database: `pscale database create netjag-wordpress --region us-east`
- [ ] Create dev branch: `pscale branch create netjag-wordpress dev`

### 2. SQL Dump Preparation
- [ ] Clean SQL dump file (remove MySQL-specific comments)
- [ ] Verify charset is utf8mb4
- [ ] Remove foreign key constraints if present
- [ ] Test import on local MySQL first (optional)

### 3. Database Import
- [ ] Connect to PlanetScale dev: `pscale connect netjag-wordpress dev --port 3309`
- [ ] Import SQL: `mysql -h 127.0.0.1 -P 3309 -u root < u756990857_vWo3d_cleaned.sql`
- [ ] Verify import: Check table count and key data

### 4. URL Updates
- [ ] Update wp_options siteurl: `https://your-vercel-domain.vercel.app`
- [ ] Update wp_options home: `https://your-vercel-domain.vercel.app`
- [ ] Update hardcoded URLs in post content (if needed)
- [ ] Update theme options and customizer settings

### 5. Deploy to Production
- [ ] Create deploy request: `pscale deploy-request create netjag-wordpress dev`
- [ ] Deploy changes: `pscale deploy-request deploy netjag-wordpress <number>`
- [ ] Create production password: `pscale password create netjag-wordpress main wordpress-app`
- [ ] Save connection credentials securely

## Vercel Deployment Steps

### 1. Repository Setup
- [ ] Initialize Git repository: `git init`
- [ ] Add files: `git add .`
- [ ] Initial commit: `git commit -m "Initial WordPress migration"`
- [ ] Create GitHub repository
- [ ] Push to GitHub: `git remote add origin <repo-url> && git push -u origin main`

### 2. Vercel Configuration
- [ ] Connect GitHub repository to Vercel
- [ ] Set build command: `echo 'WordPress build complete'`
- [ ] Set output directory: `public_html`
- [ ] Configure environment variables:
  - `DB_NAME`: netjag-wordpress
  - `DB_USER`: [PlanetScale username]
  - `DB_PASSWORD`: [PlanetScale password]
  - `DB_HOST`: [PlanetScale host]
  - `WP_HOME`: https://your-vercel-domain.vercel.app
  - `WP_SITEURL`: https://your-vercel-domain.vercel.app

### 3. WordPress Configuration
- [ ] Replace wp-config.php with wp-config-vercel.php
- [ ] Update security keys in environment variables
- [ ] Test database connection
- [ ] Verify file permissions

## Post-Migration Testing

### 1. Core Functionality
- [ ] **Homepage loads correctly**
- [ ] **Admin dashboard accessible** (/wp-admin/)
- [ ] **User login/logout works**
- [ ] **Database connection stable**
- [ ] **SSL certificate active**

### 2. Theme and Design
- [ ] **ListingPro theme loads properly**
- [ ] **CSS and JavaScript files load**
- [ ] **Images display correctly**
- [ ] **Responsive design works**
- [ ] **Custom theme features functional**

### 3. Plugin Functionality
- [ ] **Essential plugins active:**
  - ListingPro Plugin
  - Elementor
  - WPForms Lite
  - WP Mail SMTP
  - All-in-One SEO Pack
- [ ] **Plugin settings preserved**
- [ ] **Custom functionality works**

### 4. Content Verification
- [ ] **Posts display correctly** (437 posts verified)
- [ ] **Pages load properly**
- [ ] **Media files accessible**
- [ ] **Navigation menus work**
- [ ] **Search functionality**

### 5. SEO and Performance
- [ ] **Meta tags and SEO data preserved**
- [ ] **URL structure maintained**
- [ ] **Redirects configured (if needed)**
- [ ] **Site speed acceptable**
- [ ] **Core Web Vitals optimized**

## Security and Optimization

### 1. Security Measures
- [ ] **Strong database passwords**
- [ ] **WordPress security keys updated**
- [ ] **File editing disabled** (DISALLOW_FILE_EDIT)
- [ ] **HTTPS enforced**
- [ ] **Admin access secured**

### 2. Performance Optimization
- [ ] **Caching configured**
- [ ] **Image optimization**
- [ ] **Database queries optimized**
- [ ] **CDN setup (if needed)**
- [ ] **Monitoring configured**

## Backup and Monitoring

### 1. Backup Strategy
- [ ] **PlanetScale automatic backups enabled**
- [ ] **Vercel deployment history available**
- [ ] **Regular backup schedule planned**
- [ ] **Recovery procedures documented**

### 2. Monitoring Setup
- [ ] **Uptime monitoring**
- [ ] **Error tracking**
- [ ] **Performance monitoring**
- [ ] **Database monitoring**

## Final Verification Checklist

### Critical Tests
- [ ] **Homepage loads in under 3 seconds**
- [ ] **Admin login successful**
- [ ] **Contact forms work** (WPForms)
- [ ] **Email functionality** (WP Mail SMTP)
- [ ] **Search and filtering** (ListingPro features)
- [ ] **Mobile responsiveness**
- [ ] **Cross-browser compatibility**

### Content Integrity
- [ ] **All posts accessible**
- [ ] **Media files display**
- [ ] **User accounts intact**
- [ ] **Comments preserved**
- [ ] **Custom fields data**

### SEO Verification
- [ ] **Google Search Console updated**
- [ ] **Sitemap accessible**
- [ ] **Meta descriptions preserved**
- [ ] **Schema markup intact**

## Troubleshooting Common Issues

### Database Connection Issues
- Verify PlanetScale credentials
- Check SSL configuration
- Confirm database name and host
- Test connection timeout settings

### File Upload Issues
- Check file permissions
- Verify upload directory structure
- Test media upload functionality
- Configure max file size limits

### Plugin Conflicts
- Deactivate plugins one by one
- Check error logs
- Verify plugin compatibility
- Update plugins if needed

### Performance Issues
- Enable caching
- Optimize images
- Review database queries
- Check Vercel function limits

## Post-Launch Tasks

### 1. DNS and Domain
- [ ] **Update DNS records** (if using custom domain)
- [ ] **SSL certificate configured**
- [ ] **Domain redirects setup**
- [ ] **WWW vs non-WWW preference**

### 2. External Services
- [ ] **Update Google Analytics**
- [ ] **Configure Google Search Console**
- [ ] **Update social media links**
- [ ] **Email service configuration**

### 3. Maintenance
- [ ] **Schedule regular updates**
- [ ] **Monitor performance**
- [ ] **Review security logs**
- [ ] **Plan backup verification**

## Success Criteria

✅ **Migration Complete When:**
- Site loads correctly on new domain
- All functionality works as expected
- Database connection is stable
- Performance meets requirements
- Security measures are in place
- Monitoring is active

## Emergency Rollback Plan

If issues arise:
1. **Immediate**: Use Vercel rollback to previous deployment
2. **Database**: Restore from PlanetScale backup
3. **DNS**: Revert DNS changes if using custom domain
4. **Monitoring**: Check all monitoring alerts

---

**Migration Team Contact:**
- Technical Lead: [Your Name]
- Database Admin: [DBA Name]
- DevOps: [DevOps Name]

**Estimated Timeline:** 4-6 hours for complete migration
**Go-Live Date:** [Set Date]
**Rollback Deadline:** [Set Time Limit]