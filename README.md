# Overview

**PRODUCTION STATUS**: ✅ Complete and Production-Ready (October 2025)

This is a PHP-based calculator and tools website called "The Calculators Online" (https://thecalculators.online). The project is a comprehensive collection of 23 online calculators and utility tools designed to help users with various calculations across financial, ecommerce, conversion, and utility categories. The site features a searchable catalog of calculator tools, social sharing capabilities, and contact functionality via PHPMailer. Built as a server-rendered PHP application with vanilla JavaScript for client-side interactivity, it emphasizes accessibility, mobile responsiveness, and SEO optimization.

**Developed by**: Rahul Kumar (https://rahul.wp-fixhub.com)  
**Contact**: help@thecalculators.online | Helpline: 9113451527

# User Preferences

Preferred communication style: Simple, everyday language.

# System Architecture

## Frontend Architecture

**Technology Stack**: Vanilla HTML/CSS/JavaScript with no framework dependencies
- Pure CSS for styling with custom properties and responsive design patterns
- Vanilla JavaScript for DOM manipulation and event handling
- Mobile-first responsive design with Tailwind-inspired utility patterns

**Key Design Patterns**:
- Component-based card layout for calculator display
- Search and filter functionality using DOM traversal
- Progressive enhancement approach (works without JavaScript)
- Hover effects and transitions for enhanced UX

**Rationale**: The lightweight vanilla approach was chosen to minimize load times and dependencies, making the site fast and accessible. This is ideal for a tools/calculator site where performance and SEO are priorities.

## Backend Architecture

**Technology Stack**: PHP with Composer for dependency management
- Server-side rendering (no SPA framework)
- File-based routing (traditional PHP includes)
- PHPMailer library for email functionality

**Key Design Patterns**:
- Static file serving for tools and pages
- Composer autoloading for third-party dependencies
- Direct PHP template rendering

**Rationale**: PHP was selected for its ubiquity in shared hosting environments and ease of deployment. The serverless/stateless approach allows the site to scale easily without complex infrastructure.

## Data Architecture

**Current State**: No database implementation detected
- Static content delivery
- File-based content management
- No persistent data storage layer

**Future Considerations**: If dynamic content or user accounts are needed, a lightweight solution like SQLite or MySQL could be integrated.

## Social Features

**Implementation**: Client-side social sharing
- JavaScript-based share functions for Facebook, Twitter, LinkedIn, WhatsApp
- URL encoding and platform-specific share URLs
- No server-side social API integration

**Rationale**: Client-side sharing avoids server load and API complexity while providing standard social media integration.

# External Dependencies

## Third-Party Libraries

**PHPMailer (v6.11.1)**
- Purpose: Email sending functionality for contact forms and notifications
- Integration: Composer-managed dependency (installed via `composer require phpmailer/phpmailer`)
- Configuration: Uses environment variables for SMTP credentials (SMTP_HOST, SMTP_USERNAME, SMTP_PASSWORD, SMTP_PORT)
- Features: SMTP support, HTML emails, reply-to headers, error handling
- Security: Up-to-date version with known vulnerability patches applied, no hard-coded credentials

**Required Environment Variables for Production:**
- `SMTP_HOST` - SMTP server host (default: smtp.gmail.com)
- `SMTP_USERNAME` - SMTP authentication username (default: SITE_EMAIL constant)
- `SMTP_PASSWORD` - SMTP authentication password (required for production)
- `SMTP_PORT` - SMTP server port (default: 587)

## SEO & Crawling

**robots.txt Configuration**
- Allows all web crawlers
- Sitemap location: https://thecalculators.online/sitemap.xml
- Crawl delay set to 1 second
- Specific allowances for /tools/, /pages/, and /assets/ directories

**Rationale**: The site is designed for maximum discoverability with search engines, allowing full indexing of calculator tools and static pages.

## Asset Management

**Static Assets**
- CSS: Custom stylesheet at /assets/css/style.css
- JavaScript: Main application logic at /assets/js/main.js
- No build process or bundler detected
- Direct file serving without minification or compilation

**Rationale**: Simple asset structure allows for easy maintenance and deployment without complex build tooling. For production optimization, a build step could be added later.

## Hosting Considerations

The architecture suggests deployment on:
- Traditional shared hosting or VPS with PHP support
- No special server requirements beyond PHP 5.5+ and Composer
- SMTP credentials needed for email functionality
- Static file serving capability
