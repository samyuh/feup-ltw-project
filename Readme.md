# LTW Project

## Project Description
Create a website where users can list rescue pets for adoption and/or offer them a forever home.

This project was done by:
- *Diogo Samuel Gonçalves Fernandes*, up201806250
- *Hugo Miguel Monteiro Guimarães*, up201806490
- *Beatriz Mendes*, up201806551
- *Inês Quarteu*, up201806279

---
## Index
1. [Credentials](#credentials)
1. [Mockups](#Mockups)
3. [Code Practices](#Code-Practices)
4. [Features](#Features)
    4.1 [Required Features](#Required-Features)
    4.2 [Extra Features](#Extra-Features)
    4.3 [Security Features](#Security-Features)

---
### Credentials (username/password (role))

zini / ltwpet60! (User)
progengi / ltwpet60! (User)
Samuh / ltwpet60! (User)

---
### Libraries

#### Google Fonts
```html
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
```

Used in the name of the website in the header and in the welcome message in the homepage of the website. 

#### "Font Awesome" Icons
```html
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
```

Library used to implement icons in the website (for example, the star icon that is used in the pet profile to add the pet to our favorite pets list).

---
### Mockups

| Home Page | Profile |
| --- | --- |
| ![Home Page](./docs/mockups/home-page.png) | ![Profile](./docs/mockups/profile.png) |

| Dog Profile | Dog Information |
| --- | --- |
| ![Dog Profile](./docs/mockups/dog-profile.png) | ![Information](./docs/mockups/information.png) |


|Login | Register |
| --- | --- |
| ![Login](./docs/mockups/login.png) | ![Register](./docs/mockups/Register.png) |

---
### Code practices

- All the content should in english
- Git Flow followed (dont commit directly on master, use pull requests, ...)
- Always use 'use strict' at the start of javascript files

---
### Features


#### Required Features
All users should be able to:
- [x] Register a new account.
- [x] Login and logout.
- [x] Edit their profile (username and password at least).

Users that found a pet and are looking for someone to adopt it should be able to:
- [x] Add information about the pet. Including name (if any), species (e.g., dog, cat), size, color, photos, location, ...
- [x] Manage previous postings (like a blog).
- [x] List any questions, inquiries, and adoption proposals.
- [x] Accept or refuse adoption proposals.

Users looking for a pet should be able to:
- [x] Search for a pet using several search criteria.
- [x] Add pets to a favorites list.
- [x] Ask questions about a pet listed for adoption.
- [x] Propose to adopt a pet and list previous proposals.


#### Extra Features

- [x] A slideshow with all pet photos on pet page
- [x] Users that adopt a pet can add post photos of that animal after the adoption, edit their information and answer questions
- [x] A notification menu where users can see if their pet had an adoption proposal
- [x] Users can list all of their favorite pets, pets to adoption and adopted pets on their profile
- [x] Edit profile photo
- [x] Delete profile
- [x] Toggle between dark and light theme


#### Security Features

- [x] Hashed passwords (with SALT from password hash)
- [x] Session CSRF Tokens
- [x] XSS attacks prevented
- [x] Regex to filter user input
- [x] Session fixation prevented (24 hours)
- [x] SQL using prepare/execute
- [x] Data Validation: regex / php / javascript


### Technologies
- [x] Separated logic/database/presentation
- [x] Semantic HTML tags
- [x] Responsive CSS
- [x] Javascript
- [x] Ajax
     
### Usability:
- [x] Error messages
- [x] Dark mode



