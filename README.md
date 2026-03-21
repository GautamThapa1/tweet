# Chirp — A Twitter-like Social Web App

A simple social web application built with Laravel where users can register, post chirps, and manage their content.

🔗 **Live Demo:** [https://tweet-main-nnti09.free.laravel.cloud/](https://tweet-main-nnti09.free.laravel.cloud/)

---

## Features

- User registration, login, and logout
- Create, read, update, and delete chirps (posts)
- User-specific content — each user manages their own chirps
- Session-based authentication
- Clean UI with Tailwind CSS

---

## Tech Stack

- **Backend:** PHP, Laravel
- **Frontend:** Blade, Tailwind CSS
- **Database:** SQLite
- **Version Control:** Git & GitHub

---

## Getting Started

### Prerequisites

- PHP >= 8.1
- Composer

### Installation

```bash
# Clone the repository
git clone https://github.com/GautamThapa1/tweet.git
cd tweet

# Install dependencies
composer install
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start the server
php artisan serve
```

Then visit `http://localhost:8000`

---


## Author

**Gautam Thapa**
- GitHub: [@GautamThapa1](https://github.com/GautamThapa1)
