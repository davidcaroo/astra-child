# Sensei LMS Integration Guide

## 📋 Overview

This document explains how to integrate Sensei LMS with the Emprende Sin Límites theme to display real courses on your website.

---

## 🔧 Requirements

### Required Plugins

1. **Sensei LMS** (Free) - Core LMS functionality
   - Install from: WordPress.org plugin directory
   - Version: 4.0+ recommended

### Optional Plugins

2. **WooCommerce** (Free) - For paid courses
   - Only needed if you want to sell courses
   - Sensei works without it for free courses

---

## 📦 Installation Steps

### Step 1: Install Sensei LMS

```
1. WordPress Admin > Plugins > Add New
2. Search "Sensei LMS"
3. Click "Install Now" > "Activate"
4. Complete the setup wizard
```

### Step 2: Verify Theme Integration

The theme automatically detects Sensei. No configuration needed!

**Check if working:**
- Go to your homepage
- If you see "No hay cursos disponibles" = Integration is working, you just need to create courses

---

## 🎓 Creating Your First Course

### Quick Start

```
1. Sensei LMS > Courses > Add New
2. Enter course title and description
3. Add a featured image (recommended: 800x600px)
4. Click "Publish"
```

### Recommended Settings

**Course Settings Tab:**
- **Difficulty**: Choose Principiante, Intermedio, or Avanzado
- **Categories**: Create and assign categories for filtering
- **Certificate**: Enable if you want to offer certificates

**Adding Lessons:**
```
1. Sensei LMS > Lessons > Add New
2. Create lesson content
3. Assign to your course
4. Repeat for all lessons
```

---

## 🎨 Using Courses in Your Theme

### Method 1: Automatic Display (Homepage)

Courses automatically appear on your homepage if you're using the **Landing Page** template.

**Location:** Courses Grid section

### Method 2: Shortcode (Any Page)

Use the `[esl_courses]` shortcode in any page or post.

**Basic Usage:**
```
[esl_courses]
```

**With Parameters:**
```
[esl_courses count="3"]
[esl_courses category="marketing"]
[esl_courses count="4" orderby="title"]
[esl_courses columns="4"]
```

**Parameters:**
- `count` - Number of courses (default: 6)
- `category` - Filter by category slug
- `orderby` - Sort: date, title, or popularity
- `columns` - Grid columns: 2, 3, or 4

### Method 3: Gutenberg Block

```
1. Edit any page
2. Add a "Shortcode" block
3. Enter: [esl_courses count="3"]
4. Preview/Publish
```

---

## 🎯 Course Metadata

The theme automatically displays:

| Metadata | Source | Display |
|----------|--------|---------|
| **Price** | WooCommerce product | "$XX" or "Gratis" |
| **Students** | Sensei enrollments | "X estudiantes" |
| **Duration** | Calculated from lessons | "X horas" |
| **Difficulty** | Course settings | Badge |
| **Certificate** | Course settings | Badge icon |
| **Rating** | Course reviews | Star rating |

---

## 🔐 Authentication Integration

### Login/Register Buttons

The header buttons automatically connect to:
- **Iniciar Sesión** → WordPress login page
- **Registrarse** → WordPress registration page

### For Logged-In Users

When a user is logged in:
- Header shows user name/avatar
- Course cards show "Inscrito" badge for enrolled courses
- "Ver Curso" button changes to "Continuar" for enrolled courses

---

## 🎨 Customization

### Changing Course Card Design

Edit: `inc/sensei-integration.php`

Find the `esl_render_course_card()` function to customize HTML.

### Changing Number of Courses

**On Homepage:**
Edit: `blocks/courses-grid/courses-grid.php`

Change line:
```php
$courses = esl_get_sensei_courses(array('posts_per_page' => 6));
```

**In Shortcode:**
```
[esl_courses count="12"]
```

### Adding Custom Filters

You can filter by:
- Category
- Difficulty
- Price (free/paid)
- Date

Example:
```php
$courses = esl_get_sensei_courses(array(
    'posts_per_page' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'course-category',
            'field' => 'slug',
            'terms' => 'marketing',
        ),
    ),
));
```

---

## 🧪 Testing Checklist

After creating courses, verify:

- [ ] Courses appear on homepage
- [ ] Course images display correctly
- [ ] Course titles and descriptions show
- [ ] Price displays ("Gratis" or amount)
- [ ] Difficulty level badge shows
- [ ] Duration calculates correctly
- [ ] "Ver Curso" button works
- [ ] Category filtering works
- [ ] Shortcode works in pages
- [ ] Responsive design on mobile

---

## ❓ Troubleshooting

### No Courses Showing

**Possible causes:**
1. No courses published in Sensei
2. Sensei plugin not activated
3. Courses set to "Draft" status

**Solution:**
- Check Sensei LMS > Courses
- Ensure at least one course is "Published"
- Activate Sensei LMS plugin

### Course Images Not Showing

**Cause:** No featured image set

**Solution:**
1. Edit course in Sensei
2. Set featured image (right sidebar)
3. Update course

### Price Shows "Gratis" for Paid Courses

**Cause:** WooCommerce not connected

**Solution:**
1. Install WooCommerce
2. In course settings, assign a WooCommerce product
3. Set product price in WooCommerce

### Category Filter Not Working

**Cause:** No categories assigned

**Solution:**
1. Create course categories: Sensei LMS > Course Categories
2. Assign categories to courses
3. Refresh homepage

---

## 🚀 Advanced Features

### Paid Courses (Requires WooCommerce)

```
1. Install WooCommerce
2. Create a product for each course
3. In course settings, link to WooCommerce product
4. Set product price
```

### Course Prerequisites

```
1. Edit course
2. Go to "Settings" tab
3. Select prerequisite course
4. Students must complete prerequisite first
```

### Drip Content

```
1. Edit lesson
2. Set "Lesson Prerequisite"
3. Lessons unlock sequentially
```

### Certificates

```
1. Sensei LMS > Certificates > Add New
2. Design certificate template
3. In course settings, assign certificate
4. Students get certificate on completion
```

---

## 📞 Support

### Theme-Related Issues

Check: `TROUBLESHOOTING.md` in theme folder

### Sensei-Related Issues

- Official docs: https://senseilms.com/docs/
- Support forum: WordPress.org/support/plugin/sensei-lms/

---

## 🔄 Updates

When updating Sensei or the theme:

1. **Backup your site first**
2. Update plugins via WordPress admin
3. Test course display after update
4. Clear cache if using caching plugin

---

## 📝 Quick Reference

### Helper Functions

```php
// Check if Sensei is active
esl_is_sensei_active()

// Get courses
esl_get_sensei_courses(array('posts_per_page' => 6))

// Get course data
esl_get_formatted_course_data($course_id)

// Render course card
esl_render_course_card($course_id)
```

### Shortcodes

```
[esl_courses]
[esl_courses count="3"]
[esl_courses category="marketing"]
```

### File Locations

- Integration functions: `inc/sensei-integration.php`
- Courses grid block: `blocks/courses-grid/courses-grid.php`
- Main functions: `functions.php`
