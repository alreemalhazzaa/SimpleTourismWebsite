# SimpleTourismWebsite
## AlRass Entertainment Guide

A comprehensive web application designed to help users discover, filter, and reserve spots at the top-rated local attractions in AlRass. This project combines a modern frontend interface with a PHP-powered backend and MySQL database integration to manage user accounts and bookings.
## Key Features

    User Authentication: Secure Registration and Login systems using PHP and password hashing.

    Dynamic Discovery: Central navigation hub to browse different entertainment categories.

    Category Filtering: Interactive Restaurant page allowing users to filter between Fine Dining and Fast Food.

    Location Integration: Detailed lists for Cafes and Events featuring ratings and direct links to Google Maps locations.

    Reservation System: A functional booking platform where logged-in users can schedule visits and manage (cancel) their reservations.

## Repository Structure

To ensure the project runs correctly, organize your files as follows:
File Name	Purpose
index.php	The main landing page with a dynamic welcome message for logged-in users.
login_page.php	Handles user authentication and session starts.
Register_page.php	Processes new user account creation.
AllListsPage.html	The main menu for choosing between Cafes, Events, and Restaurants.
CofesPage.html	Lists local coffee shops with ratings and locations.
EventsPage.html	Lists local event venues and entertainment spots.
RestaurantPage.html	Features a filterable list of dining options and a link to reservations.
ReservationPage.html	The frontend form for submitting booking details.
ReservationPage.php	The backend logic for inserting, displaying, and deleting reservations.
HomeStyle.css	Main stylesheet for the home and category pages.
loginStyle.css	Specialized styling for authentication and reservation forms.
locationPic.jpg	Icon used for location links across the site.
## Technical Stack

    Frontend: HTML5, CSS3 (including Media Queries for mobile responsiveness), and JavaScript (for navigation and filtering).

    Backend: PHP for server-side logic and session management.

    Database: MySQL (connecting via port 3307 as per local configuration).

## Setup & Installation

    Database Creation: Create a database named ItProject in your MySQL environment.

    Table Setup:

        Create a users table for account management.

        Create a reservations table to store booking data.

    Server Environment: Place all files in your local server directory (e.g., htdocs for XAMPP).

    Access: Navigate to localhost/your-folder-name/index.php in your browser.

## Project Credits

    Developers: Leena Alturaifi & Alreem Alhazza.

    Course Context: Developed as part of an IT project involving server configuration and database management.
