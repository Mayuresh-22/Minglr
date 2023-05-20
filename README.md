# Minglr - Social Networking Site

Minglr is a secure and feature-rich social networking site that enables users to connect, interact, and share content with others. Built with PHP for the backend and HTML5, CSS, and JavaScript for the frontend, Minglr provides a seamless and enjoyable user experience.

![Minglr Preview](https://github.com/Mayuresh-22/Minglr-Social-Network-Site/blob/main/img/64671b235e98c.png)

## Features

- **User Registration and Authentication:** Easily create an account and securely log in to Minglr.
- **Account Page:** Every user gets their dedicated account page, displaying their profile information, posts, and photos.
- **Feed Page:** Browse a dynamic feed of posts shared by other users, keeping you updated on the latest content.
- **Post Sharing:** Share posts directly from your account page or the feed page, expressing yourself and connecting with others.
- **Photo Sharing:** Share photos along with your posts to enrich your content and engage with the community.
- **Info Tab:** View and manage your account information, including profile details and privacy settings, in a dedicated Info tab.
- **Photos Tab:** Access a collection of photos shared by you on your account page's Photos tab.
- **Explore Other Users:** Visit other users' account pages to see their shared posts, photos, and information.
- **Private Messaging:** Communicate privately with other users through the messaging feature, fostering personal connections.

## Demo

Experience Minglr firsthand with a live demo available at [Demo Link](https://example.com).

## Screenshots

| Account Page | Feed Page | Private Messaging |
| ------------ | --------- | ----------------- |
| ![Account Page](https://github.com/Mayuresh-22/Minglr-Social-Network-Site/blob/main/img/Minglr-Profile.png) | ![Feed Page](https://github.com/Mayuresh-22/Minglr-Social-Network-Site/blob/main/img/Minglr-Feed.png) | ![Private Messaging](https://github.com/Mayuresh-22/Minglr-Social-Network-Site/blob/main/img/Minglr-Pvt-msg.png) |

Certainly! Here are the modified installation steps to include installing and configuring XAMPP and changing the directory to `htdocs` before cloning the GitHub repository:

## Installation

Follow these steps to set up Minglr locally using XAMPP:

1. Install XAMPP:
   - Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html) based on your operating system.
   - Launch XAMPP after the installation is complete.

2. Configure XAMPP:
   - Open XAMPP and start the Apache and MySQL services.
   - Click on the "Config" button next to Apache and select "Apache (httpd.conf)".
   - In the `httpd.conf` file, search for the line `DocumentRoot "C:/xampp/htdocs"` and make sure it points to the correct directory where your web files will be located.
   - Save the changes and restart the Apache service.

3. Clone the GitHub repository:
   - Open the terminal or command prompt.
   - Change the directory to the XAMPP `htdocs` folder:
     ```bash
     cd C:\xampp\htdocs
     ```

4. Clone the repository:
   ```bash
   git clone https://github.com/Mayuresh-22/Minglr-Social-Network-Site.git
   ```

5. Configure the Database:
   - Create a MySQL database for Minglr.
   - Import the database schema from the provided SQL file (`db/database.sql`).
   - Update the database configuration in `db/connection.php` with your database credentials.

6. Configure Site Settings:
   - Open `index.php` and modify any relevant settings (e.g., site name, URL, file paths).

7. Start the Development Server:
   - Open XAMPP and start the Apache and MySQL services.
   - Launch a web browser and visit `http://localhost/Minglr-Social-Network-Site` (or the appropriate URL) to access Minglr.

Please note that the steps may vary slightly based on your specific operating system and XAMPP configuration. Make sure to adjust the paths and commands accordingly.

## Technologies Used

- PHP
- HTML5
- CSS
- JavaScript

## Contributing

Contributions to Minglr are welcome! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature/bug fix.
3. Make your changes and commit them with descriptive commit messages.
4. Push your changes to your forked repository.
5. Submit a pull request, explaining your changes and why they should be merged.

## License

This project is licensed under the [MIT License](LICENSE).
