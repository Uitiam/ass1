drop table History;
drop table Robot;
drop table Head;
drop table Torso;
drop table Legs;
drop table Company;

create table if not exists Head (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    model char(1)
);

create table if not exists Torso (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    model char(1)
);

create table if not exists Legs (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    model char(1)
);

create table if not exists Robot (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    headId bigint,
    torsoId bigint,
    legsId bigint,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    model char(1),
    line char(1),
    constraint `fkrh` foreign key (headId) references Head(id),
    constraint `fkrt` foreign key (torsoId) references Torso(id),
    constraint `fkrl` foreign key (legsId) references Legs(id)
);

create table if not exists History (
    id bigint auto_increment primary key,
    description varchar(128) charset utf8,
    user varchar(128) charset utf8,
    partType char(1),
    partId bigint,
    actionType char(1),
    sale bigint,
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table if not exists Company (
    id bigint auto_increment primary key,
    accessToken varchar(128) charset utf8,
    balance bigint,
    boxesBought bigint default 0,
    partsReturned bigint default 0,
    partsMade bigint default 0,
    botsBuilt bigint default 0,
    producing varchar(128) charset utf8,
    lastActivity TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
