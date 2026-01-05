# Emprende Sin Límites - Installation Guide

## Prerequisites

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Astra theme (parent theme)

## Installation Steps

### 1. Install Parent Theme

1. Go to **Appearance > Themes** in WordPress admin
2. Click **Add New**
3. Search for "Astra"
4. Click **Install** and then **Activate**

### 2. Install Child Theme

1. Download the `astra-child` folder
2. Compress it as a ZIP file
3. Go to **Appearance > Themes** in WordPress admin
4. Click **Add New** > **Upload Theme**
5. Choose the ZIP file and click **Install Now**
6. Click **Activate**

### 3. Configure Theme

1. Go to **Appearance > Customize**
2. Set your site logo
3. Configure menus:
   - Go to **Appearance > Menus**
   - Create a new menu
   - Assign it to "Primary Menu" location
4. Configure widgets (optional):
   - Go to **Appearance > Widgets**
   - Add widgets to footer columns

### 4. Create Landing Page

1. Go to **Pages > Add New**
2. Give it a title (e.g., "Home")
3. In the right sidebar, find **Page Attributes**
4. Select **Template: Landing Page**
5. Publish the page
6. Go to **Settings > Reading**
7. Set "A static page" and select your new page as the homepage

## Customization

### Colors

Edit `assets/css/global.css` and modify the CSS variables:

```css
:root {
    --color-primary: #0066FF;
    --color-secondary: #00D4FF;
    /* etc. */
}
```

### Typography

Change fonts in `functions.php`:

```php
wp_enqueue_style('academia-fonts', 'https://fonts.googleapis.com/css2?family=YourFont:wght@400;700&display=swap');
```

Then update in `global.css`:

```css
:root {
    --font-primary: 'YourFont', sans-serif;
}
```

### Adding Custom Blocks

1. Create a new folder in `/blocks/your-block-name/`
2. Create `your-block-name.php` with your HTML/CSS
3. Include it in your template:

```php
<?php include get_stylesheet_directory() . '/blocks/your-block-name/your-block-name.php'; ?>
```

## Recommended Plugins

- **Elementor** or **Gutenberg** - Page builder
- **Contact Form 7** - Contact forms
- **Yoast SEO** - SEO optimization
- **WP Rocket** - Caching and performance
- **Smush** - Image optimization
- **LearnDash** or **LifterLMS** - LMS functionality for courses

## Support

For issues or questions, please refer to:
- WordPress Codex: https://codex.wordpress.org/
- Astra Documentation: https://wpastra.com/docs/

## Updates

To update the theme:
1. Back up your site
2. Download the latest version
3. Replace the theme files
4. Clear cache

**Note**: Custom modifications should be documented to preserve them during updates.
