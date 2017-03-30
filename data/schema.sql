create table if not exists Model (
    id bigint auto_increment primary key,
    name char(1) charset utf8
);

create table if not exists Line (
    id bigint auto_increment primary key,
    name char(1) charset utf8
);

create table if not exists Head (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modelId bigint,
    lineId bigint,
    constraint `fkhl` foreign key (lineId) references Line(id),
    constraint `fkhm` foreign key (modelId) references Model(id)
);

create table if not exists Torso (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modelId bigint,
    lineId bigint,
    constraint `fktl` foreign key (lineId) references Line(id),
    constraint `fktm` foreign key (modelId) references Model(id)
);

create table if not exists Legs (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modelId bigint,
    lineId bigint,
    constraint `fkll` foreign key (lineId) references Line(id),
    constraint `fklm` foreign key (modelId) references Model(id)
);

create table if not exists Robot (
    id bigint auto_increment primary key,
    CACode varchar(128) charset utf8,
    headId bigint,
    torsoId bigint,
    legsId bigint,
    used char(1),
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modelId bigint,
    lineId bigint,
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
    creationTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

