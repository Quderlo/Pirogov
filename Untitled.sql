CREATE TABLE "order" (
  "id" integer PRIMARY KEY,
  "description" varchar,
  "total_cost" integer,
  "created_at" timestamp,
  "client_id" integer,
  "worker_id" integer
);

CREATE TABLE "progress" (
  "id" integer PRIMARY KEY,
  "status" varchar,
  "notes" varchar,
  "id_order" integer
);

CREATE TABLE "client" (
  "id" integer PRIMARY KEY,
  "first_name" varchar,
  "second_name" varchar,
  "adress" varchar,
  "telephone" integer,
  "created_at" timestamp
);

CREATE TABLE "client_tech" (
  "id" integer PRIMARY KEY,
  "serial_number" varchar,
  "name" varchar,
  "count" integer,
  "id_client" integer
);

CREATE TABLE "malfunction_type" (
  "id" integer PRIMARY KEY,
  "name" varchar,
  "description" varchar,
  "id_progress" integer
);

CREATE TABLE "worker" (
  "id" integer PRIMARY KEY,
  "first_name" varchar,
  "second_name" varchar,
  "telephone" integer
);

ALTER TABLE "order" ADD FOREIGN KEY ("client_id") REFERENCES "client" ("id");

ALTER TABLE "progress" ADD FOREIGN KEY ("id_order") REFERENCES "order" ("id");

ALTER TABLE "order" ADD FOREIGN KEY ("worker_id") REFERENCES "worker" ("id");

ALTER TABLE "malfunction_type" ADD FOREIGN KEY ("id_progress") REFERENCES "progress" ("id");

ALTER TABLE "client_tech" ADD FOREIGN KEY ("id_client") REFERENCES "client" ("id");
