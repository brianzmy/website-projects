-- drop all tables if they exist already in database --

drop table if exists artists_galleries;
drop table if exists artworks;
drop table if exists projects;
drop table if exists resumes;
drop table if exists galleries;
drop table if exists agents;
drop table if exists users;
drop table if exists artists;


-- script to create tables in database --

create table artists
(
    id         int(10) auto_increment
        primary key,
    name       varchar(50)                                not null,
    phone      varchar(50)                                not null,
    address    varchar(100)                               not null,
    email      varchar(50)                                not null,
    website    varchar(70)                                null,
    origin     varchar(50)                                null,
    approved   enum ('Yes', 'No')                         not null,
    indigenous enum ('Yes', 'No', 'Prefer Not To Answer') null
);

create table agents
(
    id        int(10) auto_increment
        primary key,
    name      varchar(50) not null,
    email     varchar(50) null,
    phone     varchar(50) not null,
    website   varchar(70) null,
    artist_id int(10)     null,
    constraint agents_artists_id_fk
        foreign key (artist_id) references artists (id)
            on delete cascade
);

create table galleries
(
    id             int(10) auto_increment
        primary key,
    name           varchar(50)  not null,
    email          varchar(50)  not null,
    phone          varchar(50)  not null,
    website        varchar(70)  null,
    contact_person varchar(50)  not null,
    address        varchar(100) not null,
    second_address varchar(100) null
);

create table artists_galleries
(
    id         int(10) auto_increment
        primary key,
    artist_id  int(10) null,
    gallery_id int(10) null,
    constraint artists_galleries2_artists_id_fk
        foreign key (artist_id) references artists (id),
    constraint artists_galleries2_galleries_id_fk
        foreign key (gallery_id) references galleries (id)
);

create table resumes
(
    description    varchar(3000) not null,
    experienceType varchar(200)  not null,
    id             int(10) auto_increment
        primary key,
    artist_id      int(10)       not null,
    constraint resume_artists_id_fk
        foreign key (artist_id) references artists (id)
            on delete cascade
);

create table projects
(
    type        enum ('Community Project', 'Solo Exhibition', 'Group Exhibition', 'Public Art Commission', 'Other') not null,
    name        varchar(50)                                                                                         not null,
    description varchar(500)                                                                                        not null,
    id          int(10) auto_increment
        primary key,
    resume_id   int(10)                                                                                             not null,
    location    varchar(50)                                                                                         null,
    budget      enum ('$0-$50k', '$50k - $100k', '$100 - $500k', '$500 - $1m', '$1m - $5m', '$5m +')                null,
    client      varchar(50)                                                                                         null,
    constraint artistprojects_resume_id_fk
        foreign key (resume_id) references resumes (id)
            on delete cascade
);

create table artworks
(
    id          int(10) auto_increment
        primary key,
    title       varchar(50) not null,
    year        int(4)      not null,
    location    varchar(50) not null,
    medium      varchar(50) not null,
    style       varchar(50) not null,
    project_id  int(10)     null,
    gallery_id  int(10)     null,
    artwork_img varchar(50) null,
    artist_id   int(10)     null,
    constraint artworks_artists_id_fk
        foreign key (artist_id) references artists (id)
            on update cascade on delete cascade,
    constraint artworks_galleries_id_fk
        foreign key (gallery_id) references galleries (id)
            on delete cascade,
    constraint artworks_projects_id_fk
        foreign key (project_id) references projects (id)
            on delete cascade
);

create table users
(
    user_ID    int(10) auto_increment,
    Email      varchar(50)                                   not null,
    username   varchar(20)                                   not null,
    password   varchar(255)                                  not null,
    artist_id  int(10)                                       null,
    type       enum ('Admin', 'Artist', 'Gallery', 'Client') not null,
    gallery_id int(10)                                       null,
    constraint accounts_user_ID_uindex
        unique (user_ID),
    constraint accounts_username_uindex
        unique (username),
    constraint users_gallery_id_uindex
        unique (gallery_id),
    constraint accounts_artists_id_fk
        foreign key (artist_id) references artists (id)
            on delete cascade,
    constraint users_galleries_id_fk
        foreign key (gallery_id) references galleries (id)
            on update cascade on delete cascade
);

alter table users
    add primary key (user_ID);

