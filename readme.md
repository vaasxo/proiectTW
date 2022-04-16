# Software Requirements Specification
## For Autograph Collector
Version 1.0 approved
Prepared by Radu Deleanu, Ondina Lipsa, Cristian Pelcear

Faculty of Computer Science
15/04/2022

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

* [Other Nonfunctional Requirements](#other-nonfunctional-requirements)
    * 5.1 [Performance Requirements](#51-performance-requirements)
    * 5.2 [Safety Requirements](#52-safety-requirements)
    * 5.3 [Security Requirements](#53-security-requirements)
    * 5.4 [Software Quality Attributes](#54-software-quality-attributes)
    * 5.5 [Business Rules](#55-business-rules)
* [Other Requirements](#other-requirements)




## Revision History
| Name | Date  | Reason For Changes | Version |
|------|-------|--------------------|---------|
| base | 04/15 | initial version    | 1.0     |
|      |       |                    |         |
|      |       |                    |         |

## 1. Introduction
### 1.1 Purpose
This document is meant to cover the "Autograph Collector" project for the Web Technologies class of 2022. This is the first revision for release 1.0, covering part of the HTML/CSS implementation.

### 1.2 Document Conventions
To be decided later

### 1.3 Intended Audience and Reading Suggestions
This document is meant for the evaluators that will check over the project files and functionality of the project as a whole, as well as any developer or person interested in the project documentation.

### 1.4 Product Scope
The software covered by this document is the web application "Signature", meant for people who want to store their autographs digitally and trade them with other users. The purpose of this project is to create a welcoming, easy to understand interface that helps the user quickly add, sort and find autographs. One of its main benefits is the fact that users can trade autographs between themselves, thus allowing the user to build a collection that they believe is perfect for themselves.
 
### 1.5 References
to be decided later

## Overall Description
### 2.1 Product Perspective
"Signature" is a new standalone web application, made from scratch, meant for use on browsers on both desktop computers and mobile devices.

### 2.2 Product Functions
The user must be able to:

* Create an account on the application servers
* Log into his/her personal account
* Browse all the different sections available at the top navigation bar
* Add autographs to his personal collection
* Access previously-added autographs
* Sort, view and edit the autographs in their collection
* View and trade for other autographs on the marketplace


### 2.3 User Classes and Characteristics
We anticipate that the application will be suitable for any user, however, the focus is going to be put on adults with a passion for collectibles, mainly autographs. Technical expertise is not necessary, as we aim to create a friendly user experience through modern design and a simple-to-understand platform. As the platform is meant for the general population, no educational level is to be expected from the end-user.

System administrators will also use the app, as they will be the ones who will update the news section, the ones who will give appraisals, and also the ones who will complete the maintenance.

### 2.4 Operating Environment
The product will operate on desktop and mobile applications, using any browser that the user may have. We do not expect any conflicts to appear, regardless of OS, browser or other web applications that the user may have.

### 2.5 Design and Implementation Constraints
The project is built from the ground up, using no frameworks (including bootstrap). All the code is written by the cited developers and any foreign code is licensed for personal or commercial use.

### 2.6 User Documentation
No user documentation is to be provided with the application, as our goal is to create an easy-to-understand interface that is accessible to anyone. Questions can be addressed via the "contact us" page or the "FAQ" page.

### 2.7 Assumptions and Dependencies
We plan to use various APIs in order to perfect the product, which include Google sign-in, YouTube videos and more which will be added once the back-end work begins.

## External Interface Requirements
### 3.1 User Interfaces
The logo will be used to redirect the user to the main page. If the user is not logged in, this will be the front page of the application. If the user is logged in, this will be their personal dashboard, where they can access all the other pages.

A navigation bar will be used for quick access to the most used/required pages, as it is visible in the following image from the home page:

![image](https://user-images.githubusercontent.com/59650692/163674662-8bdbe390-c7fa-473f-8bef-fc7cbd938dc6.png)

The navigation bar will help the user get to the Marketplace, News, About Us and Contact pages upon arrival in the main page. Other options will be added once the users are logged in.

The "Login" button will help the user connect to their account. This will be replaced by a photo of their profile once logged in (which can be used as a shortcut to get to their profile, as shown in the picture below:

![image](https://user-images.githubusercontent.com/59650692/163674677-1748ab09-a8e7-4e39-8587-f4df56961c61.png)

### 3.2 Hardware Interfaces
The software aims to support any device types and avoid any hardware collisions or bottlenecks.

### 3.3 Software Interfaces
The software aims to use various APIs to gather and store data related to the inner workings of the application. One example would be the database that will store all the information regarding the user and their account.

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
The end-users will require an internet connection. A stable connection is preferred overall, in order to avoid any time-outs or issues regarding the functionality of all the services that the project provides (autograph and profile picture uploading, marketplace bidding and so on)

### 5.2 Safety Requirements
There are no immediately-obvious safety requirements, however, we would like to inform our users that passions and hobbies should never become toxic and that they should always be in control of their spending and know when to stop.

### 5.3 Security Requirements
Users must secure their accounts with strong passwords and must keep them private, in order to prevent a cybersecurity incident that may directly affect them by possible loss of data, limiting access to their account. GDPR regulations will also be implemented, such that the user will have the right to be forgotten and will always have access to all the data that we hold in relation to their account.

### 5.4 Software Quality Attributes
We will prefer to implement a system that values quality over quantity and flexibility over usability. This is in order to assure our users that the app will always deliver the best experience regarding the storage of their prized possessions. As we plan to make the platform even more appealing, we will introduce a system of trading the physical autographs themselves, with our company being the middle man who will check the authenticity of the autograph being sent to the buyer.

We plan on making the project easy for developers to maintain and understand, as this will facilitate the robustness of the application and allow us to resolve any issues that may occur.

### 5.5 Business Rules
The developers who work on this project will have assigned tasks regarding future development and will be obligated to share their progress by using a version control tool (i.e. github)

## Other Requirements
No other requirements need stating at this moment.
