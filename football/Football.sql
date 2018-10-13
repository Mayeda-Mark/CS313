-- tables

-- Table: Analysis

CREATE TABLE Analysis (   
id serial  NOT NULL,    
Team_id int  NOT NULL,    
Week_id int  NOT NULL,    
Spread_id int  NOT NULL,    
Score_id int  NOT NULL,    
spreadDifference int  NOT NULL,    
CONSTRAINT Analysis_pk PRIMARY KEY (id)
);

-- Table: Score
CREATE TABLE Score (    
id serial  NOT NULL,    
Team_id int  NOT NULL,    
Week_2_id int  NOT NULL,    
TeamScore int  NOT NULL,    
OppScore int  NOT NULL,    
realSpread int  NOT NULL,    
isWin bool  NOT NULL,
CONSTRAINT Score_pk PRIMARY KEY (id)
);

-- Table: Spread
CREATE TABLE Spread (    
id serial  NOT NULL,    
Team_id int  NOT NULL,    
Week_id int  NOT NULL,    
Proj_spread int  NOT NULL,    
CONSTRAINT Spread_pk PRIMARY KEY (id)
);

-- Table: Team
CREATE TABLE Team (
id serial  NOT NULL,    
Name varchar(100)  NOT NULL,   
CONSTRAINT Name PRIMARY KEY (id)
);

-- Table: Week
CREATE TABLE Week (    
id serial  NOT NULL,  
Week int  NOT NULL,
CONSTRAINT Week_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: Analysis_Score (table: Analysis)
ALTER TABLE Analysis ADD CONSTRAINT Analysis_Score
FOREIGN KEY (Score_id)    
REFERENCES Score (id)     
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Analysis_Spread (table: Analysis)
ALTER TABLE Analysis ADD CONSTRAINT Analysis_Spread
FOREIGN KEY (Spread_id)    
REFERENCES Spread (id) 
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Analysis_Team (table: Analysis)
ALTER TABLE Analysis ADD CONSTRAINT Analysis_Team    
FOREIGN KEY (Team_id)    
REFERENCES Team (id)     
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Analysis_Week (table: Analysis)
ALTER TABLE Analysis ADD CONSTRAINT Analysis_Week    
FOREIGN KEY (Week_id)    
REFERENCES Week (id) 
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Score_Team (table: Score)
ALTER TABLE Score ADD CONSTRAINT Score_Team    
FOREIGN KEY (Team_id)    
REFERENCES Team (id)     
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Score_Week (table: Score)
ALTER TABLE Score ADD CONSTRAINT Score_Week    
FOREIGN KEY (Week_2_id)    
REFERENCES Week (id)      
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Spread_Team (table: Spread)
ALTER TABLE Spread ADD CONSTRAINT Spread_Team    
FOREIGN KEY (Team_id)    
REFERENCES Team (id)     
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;

-- Reference: Spread_Week (table: Spread)
ALTER TABLE Spread ADD CONSTRAINT Spread_Week    
FOREIGN KEY (Week_id)    
REFERENCES Week (id)     
NOT DEFERRABLE     
INITIALLY IMMEDIATE
;