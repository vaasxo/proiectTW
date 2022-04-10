# Software Requirements Specification
## For  Workout Generator
Version 1.0 approved
Prepared by Radu Deleanu, Ondina Lipsa, Alexandra Spanache
Faculty of Computer Science
04/11/2021

Table of Contents
=================
* [Revision History](#revision-history)
* [Introduction](#1-introduction)
    * 1.1 [Purpose](#11-purpose)
    * 1.2 [Document Conventions](#12-document-conventions)
    * 1.3 [Intended Audience and Reading Suggestions](#13-intended-audience-and-reading-suggestions)
    * 1.4 [Product Scope](#14-product-scope)
    * 1.5 [References](#15-references)
* [Overall Description](#overall-description)
    * 2.1 [Product Perspective](#21-product-perspective)
    * 2.2 [Product Functions](#22-product-functions)
    * 2.3 [User Classes and Characteristics](#23-user-classes-and-characteristics)
    * 2.4 [Operating Environment](#24-operating-environment)
    * 2.5 [Design and Implementation Constraints](#25-design-and-implementation-constraints)
    * 2.6 [User Documentation](#26-user-documentation)
    * 2.7 [Assumptions and Dependencies](#27-assumptions-and-dependencies)
* [External Interface Requirements](#external-interface-requirements)
    * 3.1 [User Interfaces](#31-user-interfaces)
    * 3.2 [Hardware Interfaces](#32-hardware-interfaces)
    * 3.3 [Software Interfaces](#33-software-interfaces)
    * 3.4 [Communications Interfaces](#34-communications-interfaces)
* [System Features](#system-features)
    * 4.1 [System Feature 1](#41-system-feature-1)
    * 4.2 [System Feature 2 (and so on)](#42-system-feature-2-and-so-on)
* [Other Nonfunctional Requirements](#other-nonfunctional-requirements)
    * 5.1 [Performance Requirements](#51-performance-requirements)
    * 5.2 [Safety Requirements](#52-safety-requirements)
    * 5.3 [Security Requirements](#53-security-requirements)
    * 5.4 [Software Quality Attributes](#54-software-quality-attributes)
    * 5.5 [Business Rules](#55-business-rules)
* [Other Requirements](#other-requirements)




## Revision History
| Name | Date    | Reason For Changes  | Version   |
| ---- | ------- | ------------------- | --------- |
| base | 04/11   | initial version     | 1.0       |
|      |         |                     |           |
|      |         |                     |           |

## 1. Introduction
### 1.1 Purpose
This document is meant to cover the "Workout Generator" project for the Web Technologies class of 2021. This is the first revision for release 1.0, covering part of the HTML/CSS implementation.

### 1.2 Document Conventions
To be decided later

### 1.3 Intended Audience and Reading Suggestions
This document is meant for the evaulators that will check over the project files and functionality of the project as a whole, as well as any developer or person interested in the project documentation.

### 1.4 Product Scope
The software covered by this document is the web application "Fitter", meant for people who want personalized workouts, either at home or at the gym. Its objective is to create an application that is welcoming to clients and provides a custom product based on their needs or preferences. The benefits of "Fitter" are mainly related to the cusomizability of the workouts that the app generates, which will be tailor-made for each user in particular.

### 1.5 References
to be decided later

## Overall Description
### 2.1 Product Perspective
"Fitter" is a new standalone web application, made from scratch, meant for use on browsers on both desktop computers and mobile devices.

### 2.2 Product Functions
The user must be able to:

* Create an account on the application servers
* Log into his/her personal account
* Browse all of the different sections available at the top navigation bar
* Generate one or more custom-made workouts
* Access previously-generated workouts
* Track statistics related to his workout
* View and gain achievements
* Access and modify his/her profile


### 2.3 User Classes and Characteristics
We anticipate that the application will be suitable for any user, however, the focus is going to be put on young adults who wish to develop healthy habits. Technical expertise is not necessary, as we aim to create a friendly user experience through modern design and a simple-to-understand platform. As the platform is meant for the general population, no educational level is to be expected from the end-user.

System administrators will also use the app, as they will be the ones who will update the news section, the exercises library, achievements, and also the platform overall.

### 2.4 Operating Environment
The product will operate on desktop and mobile applications, using any browser that the user may have. We do not expect any conflicts to appear, regardless of OS, browser or other web applications that the user may have.

### 2.5 Design and Implementation Constraints
The project is built from the ground up, using no frameworks (including bootstrap). All the code is written by the cited developers and any foreign code is licensed for personal or commercial use.

### 2.6 User Documentation
No user documentation is to be provided with the application, as our goal is to create an easy-to-understand interface that is accessible to anyone. Questions can be addressed via the "contact us" page or the "FAQ" page.

### 2.7 Assumptions and Dependencies
We plan to use various API's in order to perfect the product, which include Google sign-in, Youtube videos and more which will be added once the back-end work begins.

## External Interface Requirements
### 3.1 User Interfaces
The logo will be used to redirect the user to the main page. If the user is not logged in, this will be the front page of the application. If the user is logged in, this will be their personal dashboard, where they can access all of the other pages.

A navigation bar will be used for quick access to the most used/required pages, as it is visible in the following image from the home page:

![image](https://user-images.githubusercontent.com/59650692/114320125-20b4aa80-9b1d-11eb-9c71-e40d5feb123b.png)

The navigation bar will help the user get to the Leaderboard, News, About Us and Contact pages upon arrival to the main page. Other options will be added once the users are logged in.

The "Login" button will help the user connect to their account. This will be replaced by a photo of their profile once logged in (which can be used as a shortcut to get to their profile, as shown in the picture below:

![image](https://user-images.githubusercontent.com/59650692/114320191-7ee18d80-9b1d-11eb-83f0-97eaa01fc302.png)


### 3.2 Hardware Interfaces
The software aims to support any device types and avoid any hardware collisions or bottlenecks.

### 3.3 Software Interfaces
The software aims to use various API's to gather and store data related to the inner workings of the application. One example would be the database that will store all the information regarding the user and their account.

Another example is a stopwatch which reads the current system time and allows the user to track the duration of their current workout session.

### 3.4 Communications Interfaces
An emailing system will be implemented once work on the back-end side will start. A few of the services that will be implemented are:
* An automated e-mailing system, used to verify the user's email upon registering his/her account.
* A support contact form, which users will send emails to, if they have any queries regarding the website, including bugs, general inquiries etc.
* An automated e-mailing system, used to help the user reset their password.

The HTTP protocol will be heavily used in the development of the application, as it is meant to be deployed on the web.
Other technologies and mechanisms will be added once they are implemented.

## System Features

System features will be added to the document as soon as work starts on the back-end of the web application.

## Other Nonfunctional Requirements
### 5.1 Performance Requirements
The end-users will require an internet connection able to stream Youtube videos at a constant rate. A stable connection is preferred overall, in order to avoid any time-outs or issues regarding the functionality of all the services that the project provides (workout generation, profile picture uploading and so on)

### 5.2 Safety Requirements
Users may injure themselves during the workouts that they perform. While our goal is to provide a series of easy and accessible workouts, we do not take responsibility for any injuries that users may have as a direct result of the exercises that they perform.

We will provide users with the following message as a part of our "Terms and Conditions":

"We highly recommend you should always CONSULT your physician or healthcare provider BEFORE starting an exercise program or changing your diet plan. Do not start new fitness program if your physician or healthcare provider advises against it.

Whenever you feel faintness, dizziness, pain, shortness of breath or any other uncomfortable symptoms while exercising you should STOP IMMEDIATELY."

### 5.3 Security Requirements
Users must secure their accounts with strong passwords and must keep them private, in order to prevent a cybersecurity incident that may directly affect them by possible loss of data, limiting access to their account. GDPR regulations will also be implemented, such that the user will have the right to be forgotten and will always have access to all the data that we hold in relation to their account.

### 5.4 Software Quality Attributes
We will prefer to implement a system that values quality over quantity and flexibility over reusability. This is in order to assure our users that the app will always deliver the best experience regarding the workouts that they wish to perform. As we plan to make the platform available for everyone, we will focus on including a wide range of workouts. However, limitations may occur when users who have any health issues (disabilities, diseases etc.) plan on using the application.

We plan on making the project easy for developers to maintain and understand, as this will facilitate the robustness of the application and allow us to resolve any issues that may occur.

### 5.5 Business Rules
The developers who work on this project will have assigned tasks regarding future development and will be obligated to share their progress by using a version control tool (i.e. github)

## Other Requirements
No other requirements need stating at this moment.