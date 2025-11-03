# 🌍 Gaza Madad Flow (GMF)
### A Web Automation Model for Humanitarian Aid Registration in Gaza

---

## 📘 Overview
**Gaza Madad Flow (GMF)** is a humanitarian automation system designed to simplify and accelerate aid registration for citizens affected by the **October 2023 war in Gaza**.  
It allows users to register **once** through a custom web interface, and their data is automatically sent to multiple humanitarian aid platforms — reducing repetitive manual entry and ensuring faster, fairer distribution of support.

---

## 💡 Problem Statement
After the war, Gaza residents faced:
- ⚡ Weak internet and power outages  
- 🌐 Limited access to multiple registration platforms  
- 📝 Repetitive form filling for every aid program  

**GMF** solves these issues by introducing a **unified automated registration model** that works even in low-connectivity conditions.

---

## 🎯 Objectives
- Develop a Laravel-based web interface for one-time validated data entry.  
- Store submissions securely in **MySQL**.  
- Synchronize data automatically to **Google Sheets**.  
- Use **n8n automation** to submit data to multiple humanitarian platforms.  
- Deploy the system on **Render Cloud** for 24/7 accessibility.

---

## ⚙️ System Architecture
Citizen Form (Laravel Blade)
↓
MySQL Database
↓
Hourly Batch Job (UptimeRobot)
↓
Google Sheets (Central Sync)
↓
n8n Workflow Automation
↓
Humanitarian Platforms

yaml
Copy code

---

## 🧩 Core Features
✅ One-time unified registration  
✅ Automated data submission  
✅ Built-in validation and duplicate detection  
✅ Hourly background synchronization  
✅ Cloud deployment and uptime monitoring  

---

## 🛠️ Tech Stack
| Layer | Technology |
|--------|-------------|
| **Frontend** | Laravel Blade, Tailwind CSS, JavaScript |
| **Backend** | Laravel (PHP) |
| **Database** | MySQL |
| **Automation** | n8n |
| **Hosting** | Render |
| **Monitoring** | UptimeRobot |

---

## 🧪 Testing & Results
Tested on real aid portals such as:
- 🕌 KSACH Humanitarian Portal  
- 🤝 Future Hope for Affected Families  

**Results:**  
✅ Data mapped and submitted successfully  
✅ Reliable under unstable network conditions  
✅ Fast synchronization between MySQL and Google Sheets  

---

## 👩‍💻 Contributors
| Name | 
|------|
| Aya Nabil Alharazin |
| Maryam Refaa Skaik |
| Rania Raid Kashkask |
| Misk Saad Ashour |
| Alaa Shareef Yousef |

**Supervisor:** Eng. Mohammed El-Agha  
*Faculty of Information Technology, Islamic University of Gaza – Oct 2025*

---

## ☁️ Deployment
- Hosted on **Render (Free Tier)**  
- Background jobs triggered hourly via **UptimeRobot**  
- MySQL–Google Sheets synchronization handled through Laravel Scheduler  


---

## 📜 License
© 2025 Gaza Madad Flow Team — for educational and humanitarian use only.
