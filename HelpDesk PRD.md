# 🧾 HelpDesk - Ticketing System (PRD)

## 1. Problem Statement

### Current Situation

In most small and medium-sized organizations, employees and customers often communicate support issues, requests, or internal problems through **emails, chat, or verbal communication**. These methods lack centralized tracking, accountability, and analytics. As a result, it becomes difficult for management to monitor progress, measure workload, or identify recurring issues.

### User Pain Points

* No centralized place to track support requests.
* Lack of visibility into ticket status and progress.
* Difficulty prioritizing urgent issues.
* Time lost in manually following up or re-assigning tasks.
* Inconsistent record keeping and missing information.

### Business Impact

* Reduced productivity due to manual processes.
* Frustrated customers or staff from unresolved tickets.
* No structured data to analyze performance or bottlenecks.
* Inefficient internal communication and issue management.

---

## 2. Proposed Solution

### Overview

**HelpDesk** is a lightweight web-based ticketing system that allows users (customers or employees) to create, view, and track support tickets.
Admins can manage, assign, update, and close tickets, ensuring all communication and updates are stored in one centralized system.

This MVP focuses on:

* Simplicity
* Clear UI using **Tabler (Blade + Tailwind/Bootstrap)**
* Fast setup using **SQLite**
* Optional features like **file uploads** and **email notifications**

### User Roles

* **Admin**

  * Create, manage, and update tickets.
  * Assign priorities and statuses.
  * Add internal comments or attachments.
  * View ticket reports and metrics.

* **Customer**

  * Create tickets (with optional file upload).
  * View and track ticket progress.
  * Add comments or updates to their own tickets.

### User Stories

#### As a Customer:

* I want to **submit a ticket** describing my issue so that I can get help.
* I want to **view my ticket’s status** to know if it’s being resolved.
* I want to **add comments or files** to my existing tickets.

#### As an Admin:

* I want to **view all submitted tickets** in one dashboard.
* I want to **change ticket priority, type, and status** to manage workload.
* I want to **receive notifications** when new tickets are created or updated.
* I want to **analyze ticket patterns** (e.g., by category, status, or department).

### Success Metrics

* Ticket creation and update times below 5 seconds.
* 100% of tickets logged in the system (no manual follow-ups).
* At least 80% of tickets resolved within SLA (if applied).
* Admins and customers can perform all core actions without training.

---

## 3. Requirements

### Functional Requirements

| Feature                            | Description                                                |
| ---------------------------------- | ---------------------------------------------------------- |
| **Authentication**                 | Basic login and registration for Admin and Customer roles. |
| **Ticket Management**              | Create, view, update, and close tickets.                   |
| **Ticket Components**              | Department, category, priority, type, and status fields.   |
| **Comments**                       | Threaded or simple comment system under each ticket.       |
| **File Uploads (Optional)**        | Attach screenshots, images, or documents to tickets.       |
| **Email Notifications (Optional)** | Notify Admins of new tickets and Customers of updates.     |
| **Search & Filter**                | Filter tickets by department, priority, or status.         |
| **Dashboard**                      | Overview of open, pending, and closed tickets.             |
| **API (Optional)**                 | Simple REST endpoints for integration or mobile use.       |

### Technical Requirements

| Item                              | Description                                               |
| --------------------------------- | --------------------------------------------------------- |
| **Frontend**                      | Blade templates + Tabler UI (with Tailwind or Bootstrap). |
| **Backend**                       | Laravel (PHP 8+).                                         |
| **Database**                      | SQLite (lightweight, file-based).                         |
| **Authentication**                | Laravel Breeze or default auth scaffolding.               |
| **Email Notification (Optional)** | See below for alternatives.                               |
| **Hosting (MVP)**                 | See below for alternatives.                               |

#### 📧 Email Notification Options (Easy to Implement)

| Service        | Description                                  | Cost      | Setup                  |
| -------------- | -------------------------------------------- | --------- | ---------------------- |
| **Mailtrap**   | Safe testing SMTP for emails in development. | Free      | Easiest for testing    |
| **Gmail SMTP** | Use personal Gmail as mail sender.           | Free      | Simple `.env` config   |
| **SendGrid**   | Scalable email delivery for production.      | Free tier | Requires API key setup |

#### 🌐 Hosting Options (Low Cost or Free)

| Service                   | Description                                           | Type |
| ------------------------- | ----------------------------------------------------- | ---- |
| **Render**                | Free tier for PHP web apps (auto deploy from GitHub). | Free |
| **Railway**               | Fast deploy, supports Laravel + SQLite easily.        | Free |
| **InfinityFree**          | Shared hosting (cPanel-like).                         | Free |
| **Hostinger / Namecheap** | Cheap shared hosting for production use.              | Paid |

### Design Requirements

* Use **Tabler Admin Template** for a clean, professional UI.
* Consistent layout across dashboard and ticket forms.
* Responsive design for mobile and tablet users.
* Simple navigation: Dashboard → Tickets → Details → Comments.
* Light theme with accent colors for status badges.

---

## 4. Implementation

### Dependencies

* Laravel (PHP framework)
* Tabler UI Template
* SQLite database
* Laravel Breeze (Auth)
* Laravel File Storage (for uploads)
* Mail (Laravel’s built-in) + SMTP configuration (optional)
* GitHub for version control

## 5. Risks and Mitigations

| Risk                            | Description                               | Mitigation                                                             |
| ------------------------------- | ----------------------------------------- | ---------------------------------------------------------------------- |
| **Time constraints**            | Tight 1-week deadline for MVP.            | Focus on core CRUD and UI first; defer non-essential features.         |
| **Deployment issues**           | Hosting service may not support PHP well. | Choose Laravel-friendly hosts (Render or Railway).                     |
| **Email setup complexity**      | SMTP misconfiguration or blocked ports.   | Start with Mailtrap for testing before switching to Gmail or SendGrid. |
| **Scalability limits (SQLite)** | SQLite may slow under heavy load.         | Use MySQL/PostgreSQL when scaling beyond MVP.                          |
| **Security concerns**           | File upload and auth vulnerabilities.     | Validate uploads, apply middleware, sanitize inputs.                   |

---

✅ **Deliverables**

* Public GitHub repository
* README.md with setup steps, feature list, and credentials for demo
* Live demo (Render/Railway URL)

---