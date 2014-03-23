delimiter $$

CREATE TABLE IF NOT EXISTS <prefix>_<actual_table_name_with_out_prefix>
(
    id          bigint(20) NOT NULL AUTO_INCREMENT,

    string_field    varchar(45) DEFAULT NULL,
    date_field      varchar(45) DEFAULT NULL,
    int_field       varchar(45) DEFAULT NULL,

    //----------------------------------------- Status Fields
    active      tinyint(4) DEFAULT '1',
    online      tinyint(4) DEFAULT '1',
    locked      tinyint(4) DEFAULT '0',
    //----------------------------------------- tracking Fields
    created_by  int(11) DEFAULT NULL,
    created_at  datetime DEFAULT NULL,
    updated_by  int(11) DEFAULT NULL,
    updated_at  datetime DEFAULT NULL,

    admin_by    int(11) DEFAULT NULL,
    admin_at    int(11) DEFAULT NULL,
    //----------------------------------------- Revision Fields
    revision    bigint(20) DEFAULT NULL,

    PRIMARY KEY (id)
)
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 $$