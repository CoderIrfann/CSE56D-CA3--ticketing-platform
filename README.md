# CSE56D-CA3--ticketing-platform


1. Project Structure and Pages
Database (db.php): Handles database connections for fetching event data, managing ticket purchases, and updating seat availability.
Event Listing Page (index.php): Displays a list of upcoming events with cards styled to showcase each event's name, date, and location. Users can click "View Details" to see more about each event.
Event Details Page (event.php): For a selected event, this page shows specific details and available seats. Users can select a seat and proceed to purchase a ticket.
Purchase Confirmation (purchase.php): Processes the purchase of a ticket and provides a confirmation page styled with a success message.
Styles (style.css and inline styling): Custom styles ensure a professional, responsive layout across all pages.
2. Database Schema
The project requires a database with three main tables:

Events Table: Stores event details such as event ID, name, date, and location.
Seats Table: Tracks seat availability for each event with fields for seat ID, event ID, and availability status.
Tickets Table: Stores ticket purchase records, including the event ID, seat ID, and customer information.

Example Schema:
sql
Copy code
CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    date DATE,
    location VARCHAR(255)
);

CREATE TABLE seats (
    seat_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

CREATE TABLE tickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    seat_id INT,
    customer_name VARCHAR(255),
    FOREIGN KEY (event_id) REFERENCES events(event_id),
    FOREIGN KEY (seat_id) REFERENCES seats(seat_id)
);

3. Back-End PHP Logic
Database Connection: db.php establishes a PDO connection for secure and reusable database interactions.
Event Listing and Details: SQL queries fetch events and seats from the database, displaying data dynamically on the front end.
Ticket Purchase: After selecting a seat, the purchase is confirmed by updating the seat's availability and creating a new ticket record in the database.
Error Handling: Basic error handling ensures that only available seats can be selected, and that purchases are confirmed once.

4. Front-End Design and Styling
Responsive and Modern Layout: The project uses CSS Flexbox and Grid for responsive layouts, ensuring it looks professional on mobile and desktop.
Theme and Color Scheme: Consistent colors (e.g., primary blue and secondary dark) create a cohesive and modern aesthetic.
Event Cards: Events are displayed in card format with hover effects for a smooth user experience.
Confirmation Page: Uses a full-page, centered box with a thank-you message and navigation back to the homepage.

5. Features and Functionality
Event Browsing: Users can view all upcoming events in an organized grid.
Seat Selection: On each event's detail page, users see which seats are available and can choose seats to purchase.
Ticket Purchase and Confirmation: After selecting a seat, users are shown a confirmation message, and the seat is marked as unavailable to prevent double-booking.
Navigation and Links: Easy navigation between pages with well-styled buttons and links.

6. Example Workflow
Step 1: User visits the homepage (index.php) and views a list of events.
Step 2: User clicks on an event to see its details and available seats.
Step 3: User selects an available seat and confirms the purchase.
Step 4: The system updates the seat’s status and displays a confirmation message.






Flow Diagram Description
Start: User accesses the platform.
Event Listing Page (index.php)

User views a list of events.
User selects an event to view details.
Event Details Page (event.php)

System loads the selected event's details and available seats.
User selects a seat and clicks "Purchase Ticket."
Purchase Confirmation (purchase.php)

System verifies seat availability.
If the seat is available:
System updates the seat status in the database.
System creates a new ticket record.
User sees a purchase confirmation message.
If the seat is not available:
System shows an error message.
End: User navigates back to the homepage or chooses another action.



