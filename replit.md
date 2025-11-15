# Overview

Seuri Dental Specialist Website is a professional clinic website with a comprehensive admin panel for content management. The system provides a public-facing website for patients to learn about services, doctors, and book appointments, alongside a secure backend for clinic administrators to manage all content dynamically.

# User Preferences

Preferred communication style: Simple, everyday language.

# Recent Changes

## November 2025 - Styling Updates untuk Mobile & Consistency

### Font Size Standardization
- **Ukuran font body disamakan**: Semua teks non-title sekarang konsisten menggunakan `--font-body: 1.125rem`
- Desktop: 1.125rem, Tablet: 1.0rem, Mobile: clamp(1rem, 2.8vw, 1.0rem)
- Memastikan semua paragraf, list items, dan body text menggunakan ukuran yang sama

### Mobile Alignment Fix
- **Text alignment mobile ke kiri**: Semua teks di tampilan mobile (≤768px) sekarang align left
- Berlaku untuk: headings, paragraphs, cards, sections
- Lebih rapi dan mudah dibaca di mobile device
- Exceptions: Images dan buttons tetap centered jika diperlukan

### Why Choose Section Enhancement
- **File baru**: `assets/css/components/why-choose-section.css`
- Background `bg_kanan.png` dengan opacity 0.24 (24% transparency)
- Responsive untuk desktop, tablet, dan mobile
- Mobile: background auto-hidden untuk tampilan lebih bersih
- Font size menggunakan CSS variables untuk konsistensi
- Class `.why-choose-section` siap dipakai di semua service sub-pages

### Service Page Cards Fix
- **Spacing diperbaiki di mobile**: Gap antar elemen di service cards lebih rapi
- Padding disesuaikan: 1.5rem di mobile, 1.5rem 1rem di small mobile
- Text alignment left di mobile
- Icon-text group margin disesuaikan untuk tampilan lebih compact

### Consultation CTA Photo Fix
- **Fix untuk 768px-1199px**: Foto sekarang nempel ke background bawah
- Menggunakan media query khusus `@media (max-width: 1199.98px) and (min-width: 768px)`
- `align-items: flex-end` dan `object-position: bottom center`
- Berlaku untuk semua halaman dengan consultation-cta-section

### Meet Our Dentist Enhancement
- **Foto display improvement**: Added min-height untuk konsistensi tampilan foto
- Desktop: min-height 300px, Mobile: 280px, Small mobile: 260px
- `object-fit: cover` dan `object-position: center` untuk cropping yang baik
- Text alignment left di mobile untuk titles dan subtitles

### Modified Files:
1. `assets/css/style.css` - Font variables updated
2. `assets/css/components/mobile-responsive.css` - Mobile alignment fixes
3. `assets/css/components/why-choose-section.css` - **NEW FILE**
4. `assets/css/components/consultation-cta.css` - Tablet range fix
5. `assets/css/components/our-services.css` - Card spacing & alignment
6. `assets/css/components/meet-our-dentist.css` - Photo display & alignment

## November 2025 - Typography Standardization & Feature Improvements
- **Site-wide Typography Standardization**: Implemented consistent responsive typography across all pages
  - Added CSS custom properties (--font-h1 through --font-body) in style.css
  - Desktop: Uses rem values for consistent sizing
  - Mobile: Uses clamp() for fluid responsive typography (e.g., h1: clamp(2rem, 5vw, 2.4rem))
  - Applied to mobile-responsive.css for all heading levels and body text
  - Maintains existing color scheme (no color changes)

- **Doctor Profile Page Redesign**: Enhanced profile-doctor.css with modern design elements
  - Specialty badge with border (white background, gold border)
  - Experience meta with Font Awesome icons
  - Blue skill badges for "Bidang Keahlian" section
  - Formatted education list with proper spacing
  - Uppercase BOOK NOW button with hover effects
  - Improved schedule table styling with hover states

- **Mobile Service Images Fix**: Improved our-services.css mobile responsiveness
  - Service icons: 50px at ≤767px, 45px at ≤480px
  - Added object-fit: contain for proper image display
  - Typography uses CSS custom properties (--font-h3, --font-h5, --font-body)

- **Database-Driven Services Page**: Converted pages/services.php from hardcoded to dynamic
  - Fetches services from database using `fetchAll()` query
  - Proper data sanitization with htmlspecialchars and nl2br
  - Image fallback support with onerror handler
  - Empty state UI when no services available
  - Maintains "Layanan Lengkap Seuri Dental Clinic" section design

- **Admin CRUD for Doctor Categories**: Added admin/doctor_categories.php
  - Manages doctor_specialties table (specialty names)
  - Full CRUD operations following existing admin panel patterns
  - Added to admin sidebar menu

- **Blog Pagination & Filtering**: Enhanced components/berita.php functionality
  - Pagination using URL query parameters (?page=N)
  - Category filtering (?category=ID)
  - Combined filters for category + pagination
  - Displays "Tidak ada berita" when empty

## November 2025 - Mobile Responsive & Blog Fixes
- **Consultation CTA Mobile Fix**: Fixed floating photo issue on mobile by using conditional rendering
  - index.php: Photo aligned bottom with cover fit (fills container)
  - Other pages: Photo centered with contain fit (full visible, no crop)
  - Desktop layout unchanged
- **Blog Photo Path Fix**: Fixed uploaded images not showing in blog/news pages
  - Added `uploaded_image()` helper function in config.php for uploaded files
  - Blog photos now correctly load from `uploads/news/` directory
  - Fixed "array offset on null" warning by removing duplicate component include

# System Architecture

## Frontend Architecture

The frontend is built as a traditional multi-page PHP application with a component-based CSS architecture:

- **Page Structure**: Traditional PHP server-side rendering with reusable header/footer partials
- **Styling System**: Modular CSS architecture organized by components and pages
  - Component styles (`assets/css/components/`) for reusable UI elements
  - Page-specific styles (`assets/css/pages/`) for unique page layouts
  - Partial styles (`assets/css/partials/`) for header/footer
- **Responsive Design**: Mobile-first approach with dedicated mobile CSS files and breakpoint-based media queries
- **JavaScript**: Swiper.js for carousels and sliders throughout the site
- **Font**: Custom Gilroy font loaded via CDN

## Backend Architecture

**Admin Panel Design**: Separate admin directory with its own authentication layer

- **Authentication**: Session-based login system with hardcoded credentials (username: `admin`, password: `admin123`)
- **Database Layer**: Direct MySQL queries using PHP's mysqli extension via `admin/db_config.php`
- **CRUD Operations**: Full create, read, update, delete operations for:
  - Services
  - Doctors and doctor specialties
  - Doctor schedules
  - Testimonials
  - News/Blog posts
  - Promotions
  - Facilities
  - Partners
  - Website settings
- **File Uploads**: Image upload handling for doctors, services, news, etc.

## Data Storage

**Database**: MySQL relational database (`seuri_dental`)

Key tables include:
- `services` - Clinic service offerings
- `doctors` - Doctor profiles with specialty relationships
- `doctor_specialties` - Medical specialization categories
- `doctor_schedules` - Appointment scheduling (uses English day names: Monday, Tuesday, etc.)
- `bookings` - Patient appointment bookings
- `testimonials` - Patient reviews
- `news` - Blog/news articles
- `promos` - Promotional campaigns
- `facilities` - Clinic facility images
- `partners` - Partner/insurance company logos

**Schema Updates**: Migration-style SQL files for schema evolution:
- `database/seuri_dental.sql` - Base schema
- `database/update_schema.sql` - Schema updates
- `database/create_bookings_table.sql` - Booking functionality

## Design Patterns

**URL Routing**: Apache `.htaccess` with mod_rewrite for clean URLs

**Component Reusability**:
- Header/footer partials included across all pages
- CSS components styled independently for maintainability
- Service cards, doctor profiles, and testimonials as repeatable UI patterns

**Data Flow**:
1. Frontend pages query database directly via included DB config
2. Admin panel performs CRUD operations with immediate MySQL writes
3. Image uploads stored in filesystem (`uploads/` directory) with filenames saved to database
4. No API layer - direct database access pattern

**Image Handling**:
- Static assets (logos, icons): stored in `assets/image/` and accessed via `image()` helper
- Uploaded content (news, doctors): stored in `uploads/{type}/` and accessed via `uploaded_image()` helper
- Admin uploads to category-specific folders (news, doctors, etc.)

## Key Architectural Decisions

**Monolithic PHP Application**: Chose traditional PHP architecture over modern frameworks for simplicity and ease of deployment on basic hosting environments. This allows the clinic to run the site on standard LAMP stack hosting without specialized requirements.

**Session-Based Authentication**: Simple session management for admin access rather than token-based auth. Trade-off: easier implementation but requires server-side session storage.

**Direct Database Access**: No ORM or query builder - raw SQL queries via mysqli. Provides full control but requires manual SQL injection prevention.

**File-Based Routing**: Uses Apache .htaccess instead of application-level routing. Simpler for small projects but less flexible for complex routing needs.

**Component CSS Strategy**: Organized CSS by component rather than page to enable reuse and easier maintenance. Each UI component has isolated styles.

# External Dependencies

## Third-Party Libraries

**Swiper.js**: Carousel/slider functionality for services, testimonials, doctor profiles, and before/after galleries

**Bootstrap 5**: CSS framework for responsive grid layout and utility classes (evidenced by Bootstrap class usage throughout CSS)

**Font Awesome**: Icon library for UI elements (contact icons, search icons, etc.)

## External Services

**WhatsApp Integration**: Direct WhatsApp links for patient contact and appointment booking

**Google Fonts CDN**: Gilroy font family loaded from CDN (fonts.cdnfonts.com)

## Hosting Requirements

- **Web Server**: Apache with mod_rewrite enabled
- **PHP**: Version 7.4 or higher
- **Database**: MySQL 5.7 or higher
- **File System**: Write permissions for image upload directories

## Development Tools

**XAMPP/WAMP/MAMP**: Recommended local development environments for running the LAMP stack