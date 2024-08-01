https://github.com/Mayuresh-22/Minglr/assets/111348926/332b573b-9811-4878-869c-43029c318a50


# Minglr - Social Networking Site

[![CodeFactor](https://www.codefactor.io/repository/github/mayuresh-22/minglr/badge)](https://www.codefactor.io/repository/github/mayuresh-22/minglr)

Minglr is a secure and feature-rich social networking site that enables users to connect, interact, and share content with others. Built with PHP for the backend and HTML5, CSS, and JavaScript for the front end, Minglr provides a seamless and enjoyable user experience.

![Minglr Preview](https://github.com/Mayuresh-22/Minglr/blob/main/img/minglr.png)

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

Experience Minglr firsthand with a live website at [https://minglr.cu.ma/](https://links.mayuresh.me/minglr).

## Screenshots

| Account Page |
| ------------ |
| ![Account Page](https://github.com/Mayuresh-22/Minglr/blob/main/img/Minglr-Profile.png) |

| Feed Page |
| ------------ |
![Feed Page](https://github.com/Mayuresh-22/Minglr/blob/main/img/Minglr-Feed.png) | 

| Private Messaging |
| ----------------- |
![Private Messaging](https://github.com/Mayuresh-22/Minglr/blob/main/img/Minglr-Pvt-msg.png) |

Certainly! Here are the modified installation steps including installing and configuring XAMPP and changing the directory to `htdocs` before cloning the GitHub repository:

## Setting up the project (developer)

Follow these steps to set up Minglr locally using XAMPP:

1. Install XAMPP:
   - Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html) based on your operating system.
   - Launch XAMPP after the installation is complete.

2. Configure XAMPP:
   - Open XAMPP and start the Apache and MySQL services.
   - If these services do not start, you may need to change the ports for Apache and MySQL in the XAMPP settings.

3. Clone the GitHub repository:
   - Head over to C:\xampp\htdocs in your Windows Explorer. (If you installed XAMPP in a different location, you will need to navigate to that folder instead.)
   - Open the terminal or command prompt in the same folder.
   - Execute the following command to change the directory to `htdocs`:
     ```bash
     cd C:\xampp\htdocs
     ```

4. Clone the repository:
   - Execute the following command to clone the GitHub repository:   
   ```bash
   git clone https://github.com/Mayuresh-22/Minglr.git
   ```

5. Create and Configure the Database:
   - Open the XAMPP control panel and start the Apache and MySQL services.
   - Open `http://localhost/phpmyadmin` in a web browser to access phpMyAdmin.
   - Create a new MySQL database by clicking "new" option on left sidebar. Name it `minglr`.
   - Import the database schema from the provided SQL file (`db/database.sql`).
   - Update the database configuration in [`db/connection.php`](db/connection.php) with your database credentials (For example: LOCALHOST, USERNAME, PASSWORD, DATABASE). Follow this step only if you have changed the default database name or credentials.

6. Start the Development Server:
   - Open XAMPP and start the Apache and MySQL services (If not already started).
   - Launch a web browser and visit `http://localhost/Minglr` or `http://127.0.0.1/Minglr` to access Minglr.

Congratulations! You have successfully set up Minglr on your machine.

Please note that the steps may vary slightly based on your specific operating system and XAMPP configuration. Make sure to adjust the paths and commands accordingly.

## Technologies Used

- PHP
- HTML5
- CSS
- JavaScript
- MySQL
- [DiceBear](https://www.dicebear.com/) HTTP API

## Contributing

Contributions to Minglr are welcome! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature/bug fix.
3. Make your changes and commit them with descriptive commit messages.
4. Push your changes to your forked repository.
5. Submit a pull request, explaining your changes and why they should be merged.

## Project Admin
[Mayuresh Choudhary](https://github.com/Mayuresh-22)
Email: [mayureshchoudhary22@gmail.com](mailto:mayureshchoudhary22@gmail.com)

## 💖 Thanks to Our Contributors
<a>
  <img src="https://contributors-img.web.app/image?repo=Mayuresh-22/Minglr" />
</a>


## License

This project is licensed under the [MIT License](LICENSE).
