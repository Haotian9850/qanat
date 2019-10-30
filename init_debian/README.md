# Make/Clean Database

Scripts
======

[`./make.sh`](make.sh)

- Makes the database from scratch.
- Calls `./clean.sh` to delete all existing data first.

[`./clean.sh`](clean.sh)

- Deletes all existing data

[`./connect.sh`](connect.sh)

- Logs into the database CLI

Noteable SQL files
=====
- [insert_all_data.sql](insert_all_data.sql)
  - Inserts all the data to the database
  - sources [create_tables.sql](create_tables.sql) to create the schema
- [destroy_database.sql](destroy_database.sql)
  - Properly drops all the tables
