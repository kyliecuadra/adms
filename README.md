# **CvSU Accreditation Document Management System**

## **Overview**

The **CvSU Accreditation Document Management System** primary objective of document management is to ensure that documents are readily accessible, secure, and version-controlled accurately. It is the process by which an organization stores, manages, and monitors its digital documents and makes it easy for users to do their work and gives the university security, data reliability, and better work process management. Eventually, many of these features will save time, make work easier, protect the investment in making these papers, enforce quality standards, create an audit trail, and ensure people are held accountable.

## **Key Features**

**Account Management Module**  
The system has three levels of access:  
- **Institutional Development Office (Administrator):** Manages user accounts within the system.  
- **Quality Assurance Coordinator:** Assigns roles and permissions based on users' positions and responsibilities.  
- **Area Coordinator (Task Force):** Assigned to manage specific accreditation areas.  

**Archive Module**  
A secure repository for storing accreditation documents that are no longer in active use but may be required for reference or compliance purposes. It allows users to categorize and organize archived files while ensuring protection from unauthorized access.  

**System Configuration Module**  
Manages the addition and configuration of key entities such as campuses, departments, and document categories. It automatically updates workflows and access permissions when a new structure is added, ensuring consistency across the system.  

**Messaging Module**  
Facilitates communication between users, such as document requesters and approvers. Supports real-time messaging and attachments to streamline discussions regarding accreditation requirements.  

**Event Scheduling Module**  
Integrates with calendars and sends reminders to keep users informed about upcoming events. Supports recurring schedules and provides an overview of planned accreditation dates.  

**Request Document Module**  
Allows users to request specific accreditation documents from the Institutional Development Office. Users can specify the document type, benchmark, and parameter. The module also tracks request statuses and facilitates approval workflows.  

**Notification Module**  
Notifies users about important updates, such as approved requests, document uploads, or upcoming deadlines. Supports in-system alerts to ensure timely delivery of notifications.  

**Search Module**  
Enables users to quickly locate accreditation documents using keywords, advanced filters, and sorting options, improving efficiency in retrieving required information.  

**Content Management System (CMS) Module**  
Oversees document organization, publication, and control. Allows authorized users to manage documents, categorize files, and update descriptions to maintain an organized repository.  

**Database Management**  
Utilizes a relational database management system (DBMS) to store and manage user information, accreditation documents, and other relevant data. The database schema is optimized for efficient data retrieval and integrity assurance.  

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript, jQuery, Bootstrap 5
- **Backend**: PHP
- **Database**: MySQL (XAMPP for local development)

## **Setup Instructions**

1. **Clone the repository**:
   ```bash
   git clone https://github.com/kyliecuadra/adms.git
   ```
2. **Install XAMPP (if not already installed):**:

  - Download and install XAMPP from XAMPP official website.
  - Start Apache and MySQL services.
3. **Set up the Database:**

  - Create a database named nxs.
  - Import the provided nxs.sql file to set up the tables:
    ```bash
     mysql -u root -p nxs < adms.sql
    ```
4. **Configure the Web Server:**

  - Place the project files in the htdocs directory of your XAMPP installation (e.g., C:\xampp\htdocs\spa_system).
  - Ensure proper file permissions for read and write access.
5. **Access the System:**

  -Open a web browser and navigate to http://localhost/adms to start using the system.

## **Usage**
1. **Receptionist Registration:**

  - Admin users can register receptionists who are responsible for managing client points.

2. **Client Check-In:**

  - Once a client is registered, an encrypted QR code is generated.
  - The QR code can be downloaded, sent via email, or the client can take a picture for easy future access.
  
3. **Point Management:**

  - Receptionists can add and redeem points based on client activities and services availed.
  
4. **Reports:**

  - Admins and Receptionist can generate reports to analyze points, services, and other client interactions.

## **Contributing**
If you'd like to contribute to this project, feel free to fork the repository and submit a pull request with your improvements. Please make sure your code follows the existing structure and includes tests where applicable.

## **License**
This project is licensed under the [MIT](https://choosealicense.com/licenses/mit/) License


## Contributors

- **IDO** - Kylie Cuadra
- **QUAAC/TASKFORCE** - Prince Allyson Macalino

## Contact
For questions or further information, please contact:
- Kylie Cuadra - christkylie.cuadra@gmail.com
- Prince Allyson Macalino - macalinoprinceallyson@gmail.com
