# Instacart Quality Reports 🛒

Instacart Quality Reports is a 3-tier cloud-based application that lets users check the quality of grocery items using real-time feedback stored in a MariaDB database. Users can enter items like "Milk" or "Strawberries" to see whether they’ve been flagged as expired, damaged, or low quality.

While this version focuses on item quality, future iterations will expand the concept into a **Pinterest-style visual pantry tool** — helping users track food freshness, save meal inspirations, and organize their groceries visually.

## Tech Stack

- **Frontend:** HTML + JavaScript
- **Middleware:** PHP API (`api.php`)
- **Database:** MariaDB (running on AWS EC2)
- **Hosting:** AWS EC2 (3-tier architecture)

## 🌐 Live Demo

*Not currently hosted — frontend can be viewed on GitHub Pages; API temporarily offline due to AWS Learner Lab access.*

## Features

- Users enter a food item (e.g. "Milk")
- Frontend sends request to API
- Middleware queries `quality_reports` database
- API returns item status: e.g. “Expired”, “Fresh”, “Damaged”

## Architecture

- **Server 1:** Frontend (HTML form + JS fetch)
- **Server 2:** Middleware (PHP script returning JSON)
- **Server 3:** MariaDB database storing food quality entries

## Future Plans

- Visual “pantry board” with pinned items
- Weekly freshness suggestions
- Grocery tracking with image-based interface
- Recipe suggestions based on what’s still fresh

## 🧠 Author Notes

This project was built to demonstrate understanding of multi-tier cloud architecture using AWS EC2, Linux configuration, and database access via middleware APIs.
