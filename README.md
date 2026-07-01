# Local Scholarship Management System (LSMS)

A specialized administrative system designed for local government units and organizations to manage, track, and rank scholarship applicants efficiently. The system automates the selection process based on academic merit while allowing real-time roster adjustments.

## Core Architecture & Features

### 1. Dynamic Merit-Based Sorting
The system automatically processes and sorts all applicant records dynamically based on their entrance/qualification exam scores. 
* Order: Descending order (Highest score ranked 1st).
* Tie-breaking: Configurable by submission timestamp or secondary criteria (e.g., GPA) to maintain deterministic ordering.

### 2. The "Top 300" Rolling Roster Constraint
To comply with local quota limits, the primary administrative dashboard enforces a strict display window:
* Only the top 300 qualified applicants are rendered in the active management table.
* Applicants ranked 301 and below are securely maintained in the background database as a pending queue.

### 3. Real-Time Cascading Replacement Queue
The system features an automated, cascading queue mechanism to handle disqualifications, document deficiencies, or voluntary withdrawals.
* Action: When an administrator removes or disqualifies a student within the active top 300 roster (e.g., the 51st ranked applicant is removed due to a lack of physical qualifications), the system triggers an immediate recalculation.
* Behavior: The student ranked 301st is automatically promoted into the active 300-student display pool in real time, shifting all intermediate ranks seamlessly.

---

## System Requirements & Installation
*(Update these instructions depending on your selected stack, e.g., Node.js, Python, or PHP)*

1. Clone this repository:
   git clone https://github.com/your-username/local-scholarship-system.git
   cd local-scholarship-system

2. Install dependencies:
   npm install

3. Run the development server:
   npm run dev

## License
Distributed under the MIT License. See LICENSE for more information.