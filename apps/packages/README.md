# Packages React App

A React application for browsing and displaying ARCWP software packages including WordPress plugins, themes, and React components.

## Features

- **Package Listing**: Grid-based display of all packages with filtering
- **Type Filtering**: Filter packages by type (Plugins, React, Themes)
- **Search**: Full-text search across package titles, summaries, and descriptions
- **Single Package View**: Detailed view for individual packages with routing
- **Dark Mode**: Full dark mode support using Tailwind CSS
- **Responsive**: Mobile-first responsive design

## Development

### Prerequisites

- Node.js 16+
- npm or yarn
- WordPress with Gateway plugin

### Install Dependencies

```bash
cd apps/packages
npm install
```

### Development Build

```bash
npm run dev
```

This will watch for changes and rebuild automatically.

### Production Build

```bash
npm run build
```

Output files will be generated in `/js/` directory in the theme root.

## Architecture

- **React Router**: Client-side routing for /packages and /packages/:slug
- **WordPress REST API**: Fetches package data from `arcwp/v1/packages` endpoint
- **Tailwind CSS 4**: Styling with dark mode support
- **WordPress Element**: Uses @wordpress/element instead of React directly

## File Structure

```
apps/packages/
├── src/
│   ├── components/
│   │   ├── filters/         # Filter components
│   │   ├── PackageCard/     # Package card component
│   │   ├── PackageList/     # List view component
│   │   └── PackageSingle/   # Detail view component
│   ├── services/
│   │   └── api.js          # API service layer
│   ├── App.js              # Main app with routing
│   └── index.js            # Entry point
├── package.json
└── README.md
```

## WordPress Integration

### Page Template

Create a WordPress page using the "Packages" template (`page-packages.php`).

### Routing

The app uses WordPress rewrite rules to handle `/packages/:slug` routes, passing all traffic to React Router.

### API Endpoints

- `GET /wp-json/arcwp/v1/packages` - List all packages
- `GET /wp-json/arcwp/v1/packages/:id` - Get single package by ID

## Styling

Uses Tailwind CSS 4 with custom color scheme:
- **Light mode**: slate-50 backgrounds, slate-900 text
- **Dark mode**: slate-900 backgrounds, slate-50 text
- **Accent**: orange-600

Dark mode is automatically enabled when the `html.dark` class is present (controlled by theme).
