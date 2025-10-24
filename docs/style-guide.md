# ARC Suite Theme - Style Guide

## Brand Colors

Our design system uses a minimal 3-color palette for maximum consistency and clarity.

### Color Palette

| Label           | Role                          | Tailwind Class           | Hex     | Notes                                                                 |
|-----------------|-------------------------------|--------------------------|---------|-----------------------------------------------------------------------|
| **text-primary**    | Primary Text (Light Mode)     | `text-slate-900`         | #0f172a | Default text color for body and headings in light mode                |
| **text-primary**    | Primary Text (Dark Mode)      | `text-slate-50`          | #f8fafc | Default text color for body and headings in dark mode                 |
| **bg-primary**      | Background (Light Mode)       | `bg-slate-50`            | #f8fafc | Default page background in light mode (set on body)                   |
| **bg-primary**      | Background (Dark Mode)        | `bg-slate-900`           | #0f172a | Default page background in dark mode (set on body)                    |
| **accent**          | Accent & CTAs                 | `bg-orange-600`          | #ea580c | Primary action buttons, links, highlights                             |
| **accent-hover**    | Accent Hover State            | `bg-orange-700`          | #c2410c | Hover state for accent elements                                       |

### Color Usage Guidelines

- **Always use dark mode variants**: Apply both light and dark mode colors using `text-slate-900 dark:text-slate-50` pattern
- **Background**: Set on body element only, avoid setting background colors elsewhere unless necessary for component contrast
- **Borders**: Use `border-slate-900 dark:border-slate-50` for all borders and dividers
- **No gray variations**: Avoid using gray-300, gray-400, zinc-*, neutral-* - stick to slate-900/slate-50 only
- **Accent color**: Use orange-600 for all CTAs, primary buttons, and interactive elements

### Example Usage

```html
<!-- Text -->
<h1 class="text-slate-900 dark:text-slate-50">Heading</h1>
<p class="text-slate-900 dark:text-slate-50">Body text</p>

<!-- Buttons -->
<button class="bg-orange-600 text-slate-50 hover:bg-orange-700">Primary CTA</button>
<button class="border-2 border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50 hover:bg-slate-900 dark:hover:bg-slate-50 hover:text-slate-50 dark:hover:text-slate-900">Secondary Button</button>

<!-- Borders -->
<div class="border-t border-slate-900 dark:border-slate-50">Content</div>

<!-- Links -->
<a href="#" class="text-orange-600 hover:opacity-70">Link</a>
```

## Typography

### Font Families

| Usage           | Font Family   | Fallback Stack                                      |
|-----------------|---------------|-----------------------------------------------------|
| **Body Text**   | Geist         | `'Geist', -apple-system, BlinkMacSystemFont, sans-serif` |
| **Headings**    | Lexend Exa    | `'Lexend Exa', -apple-system, BlinkMacSystemFont, sans-serif` |

### Typography Scale

| Element                  | Font       | Size  | Line-Height    | Weight | Tailwind Classes                                        |
|--------------------------|------------|-------|----------------|--------|---------------------------------------------------------|
| **Hero Heading (H1)**    | Lexend Exa | 48px  | 56px (1.17x)   | 900    | `text-4xl md:text-5xl font-black leading-tight`         |
| **Page Heading (H1)**    | Lexend Exa | 36px  | 44px (1.22x)   | 900    | `text-3xl md:text-4xl font-black leading-tight`         |
| **Section Heading (H2)** | Lexend Exa | 28px  | 36px (1.29x)   | 800    | `text-2xl md:text-3xl font-extrabold leading-snug`      |
| **Subheading (H3)**      | Lexend Exa | 20px  | 28px (1.4x)    | 700    | `text-xl font-bold leading-normal`                      |
| **Body Text (Base)**     | Geist      | 16px  | 24px (1.5x)    | 400    | `text-base leading-relaxed`                             |
| **Body Text (Large)**    | Geist      | 18px  | 28px (1.56x)   | 400    | `text-lg leading-relaxed`                               |
| **Small Text**           | Geist      | 14px  | 20px (1.43x)   | 500    | `text-sm font-medium leading-normal`                    |
| **Label/Caption**        | Geist      | 12px  | 16px (1.33x)   | 600    | `text-xs font-semibold leading-tight`                   |

### Font Weights

| Weight Name   | Value | Usage                           | Tailwind Class    |
|---------------|-------|---------------------------------|-------------------|
| Normal        | 400   | Body text, paragraphs           | `font-normal`     |
| Medium        | 500   | Small text, labels              | `font-medium`     |
| Semibold      | 600   | Emphasized text, captions       | `font-semibold`   |
| Bold          | 700   | Subheadings (H3)                | `font-bold`       |
| Extrabold     | 800   | Section headings (H2)           | `font-extrabold`  |
| Black         | 900   | Page/hero headings (H1)         | `font-black`      |

### Typography Guidelines

- **Base font size**: 16px (1rem) for optimal readability
- **Headings**: Always use Lexend Exa with appropriate font-black or font-extrabold weights
- **Body text**: Always use Geist with font-normal (400) weight
- **Line height**: Use `leading-relaxed` (1.5x) for body text for better readability
- **Color**: All text should use `text-slate-900 dark:text-slate-50` unless it's an accent link

### Example Typography

```html
<!-- Hero Heading -->
<h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-slate-50 leading-tight">
    Make WordPress Sites That Scale
</h1>

<!-- Section Heading -->
<h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-slate-50 leading-snug">
    Built to Scale
</h2>

<!-- Body Text -->
<p class="text-base text-slate-900 dark:text-slate-50 leading-relaxed">
    From rapid prototyping to enterprise-grade applications. ARC Suite gives you the professional tools and frameworks to build exceptional WordPress experiences.
</p>

<!-- Small Label -->
<span class="text-sm font-medium text-slate-900 dark:text-slate-50">
    Updated Jan 15, 2025
</span>
```

## Component Patterns

### Buttons

```html
<!-- Primary Button -->
<button class="bg-orange-600 text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-orange-700 transition-colors">
    Get Started
</button>

<!-- Secondary Button -->
<button class="border-2 border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-slate-900 dark:hover:bg-slate-50 hover:text-slate-50 dark:hover:text-slate-900 transition-colors">
    Learn More
</button>
```

### Cards

```html
<article class="rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all">
    <div class="p-6">
        <h3 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-3">
            Card Title
        </h3>
        <p class="text-slate-900 dark:text-slate-50 leading-relaxed">
            Card description text
        </p>
    </div>
</article>
```

### Borders & Dividers

```html
<!-- Horizontal Divider -->
<div class="border-t border-slate-900 dark:border-slate-50"></div>

<!-- Section Border -->
<section class="border-b border-slate-900 dark:border-slate-50 py-16">
    <!-- Content -->
</section>
```

## Spacing Scale

Use Tailwind's default spacing scale:
- **xs**: 0.25rem (4px)
- **sm**: 0.5rem (8px)
- **base**: 1rem (16px)
- **lg**: 1.5rem (24px)
- **xl**: 2rem (32px)
- **2xl**: 2.5rem (40px)
- **4xl**: 4rem (64px)

## Design Principles

1. **Consistency First**: Use only the 3 brand colors (slate-900, slate-50, orange-600)
2. **Dark Mode Native**: Always include dark mode variants for all color classes
3. **Typography Hierarchy**: Use Lexend Exa for headings, Geist for body text
4. **Minimal Color Palette**: Avoid introducing new color variations
5. **Accessible Contrast**: Ensure sufficient contrast ratios (WCAG AA minimum)
6. **Semantic HTML**: Use proper heading levels and semantic elements
