🌍 Gaza Madad Flow (GMF)
A Web Automation Model for Humanitarian Aid Registration in Gaza
📖 Overview

Gaza Madad Flow (GMF) is a humanitarian automation system developed to simplify and accelerate aid registration for citizens affected by the October 2023 war in Gaza.
It allows beneficiaries to register once through a custom web interface and have their data automatically sent to multiple humanitarian aid platforms — reducing repetitive manual entry and ensuring faster, fairer distribution of support.

🧠 Problem Statement

After the war, most Gaza residents faced:

Weak internet and power outages

Limited access to multiple registration platforms

Repetitive form filling for each aid program

GMF solves these issues by introducing a unified, automated registration model that works even in low-connectivity conditions.

🎯 Objectives

Build a Laravel-based web interface for one-time validated data entry.

Store all submissions securely in MySQL.

Synchronize data automatically to Google Sheets for workflow processing.

Use n8n automation to submit data to several humanitarian platforms.

Ensure reliability through hourly background synchronization and real-case testing.

⚙️ System Architecture
Citizen Form (Laravel Blade)
        ↓
MySQL Database (validated records)
        ↓
Hourly Batch Job (UptimeRobot trigger)
        ↓
Google Sheets (central source)
        ↓
n8n Workflow (data cleaning + mapping + POST submission)
        ↓
Humanitarian Aid Platforms

🧩 Core Features

✅ One-time unified registration
✅ Automated submission to multiple aid platforms
✅ Built-in validation and duplicate detection
✅ Offline/low-connectivity support
✅ Hourly data sync from MySQL → Google Sheets
✅ Cloud deployment on Render
✅ Continuous monitoring with UptimeRobot

🛠️ Tech Stack
Category	Tools
Backend Framework	Laravel (PHP)
Database	MySQL
Frontend	Blade + TailwindCSS + JavaScript
Automation Platform	n8n
Cloud Hosting	Render
Monitoring	UptimeRobot
Version Control	GitHub
Documentation & Collaboration	Google Sheets, WhatsApp, MS Word
🧪 Prototyping Methodology

GMF was developed using Incremental Prototyping, evolving through five stages:

Prototype 1: Data collection via Google Forms

Prototype 2: Automated submission to one aid platform

Prototype 3: Multi-platform integration

Prototype 4: Laravel + MySQL + hourly batch workflow

Prototype 5: Deployment on Render and cloud testing

🧵 Workflow Implementation (n8n)

Trigger: New record added to Google Sheet

GET Request: Scrape aid platform form

Map Fields: Match citizen data to platform requirements

POST Request: Submit automatically with CSRF tokens and cookies

Update Sheet: Mark record as processed (ScrapedAt timestamp)

📈 Testing & Results

Realistic tests were conducted using:

Saudi Heritage Center Aid Portal

Future Hope for Affected Families Platform

✅ Data mapped and submitted automatically
✅ Real-time synchronization confirmed
✅ Reliable operation under limited network conditions

☁️ Deployment

Hosted on Render (free tier)

Background jobs triggered hourly using UptimeRobot

MySQL database + Laravel backend continuously synced with Google Sheets

🔒 Data Privacy

All collected data is stored securely and shared only with authorized aid platforms.
Sensitive information is encrypted, ensuring integrity and user privacy.

🚀 Future Improvements

Integration with additional humanitarian platforms

AI-based field mapping via LLMs

Multi-language support

Automatic form adaptation for unknown structures

Conversion into a fully managed cloud service

👩‍💻 Contributors		
Aya Alharazin		
Maryam Skaik		
Rania Kashkask		
Misk Ashour		
Alaa Yousef		

Supervisor: Eng. Mohammed El-Agha
Faculty of Information Technology – Islamic University of Gaza
October 2025

📄 License

This project is part of a graduation thesis and is shared for educational and humanitarian purposes only.
All rights reserved © 2025 Gaza Madad Flow Team.
