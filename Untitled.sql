create Table "order" (
  "id" serial primary key,
  "description" varchar,
  "total_cost" int,
  "created_at" timestamp,
  "client_id" int,
  "worker_id" int
);

create Table "progress" (
  "id" serial primary key,
  "status" varchar,
  "notes" varchar,
  "id_order" int references "order" ("id")
);

create Table "client" (
  "id" serial primary key,
  "first_name" varchar,
  "second_name" varchar,
  "adress" varchar,
  "telephone" int,
  "created_at" timestamp
);

create Table "client_tech" (
  "id" serial primary key,
  "serial_number" varchar,
  "name" varchar,
  "count" int,
  "id_client" int references "client" ("id")
);

create Table "malfunction_type" (
  "id" serial primary key,
  "name" varchar,
  "description" varchar,
  "id_progress" int references "progress" ("id")
);

create Table "worker" (
  "id" serial primary key,
  "first_name" varchar,
  "second_name" varchar,
  "telephone" int
);

alter table "order" add constraint "order_client_id_fkey" foreign key ("client_id") references "client" ("id");
alter table "order" add constraint "order_worker_id_fkey" foreign key ("worker_id") references "worker" ("id");
alter table "progress" add constraint "progress_order_id_fkey" foreign key ("id_order") references "order" ("id");
alter table "malfunction_type" add constraint "malfunction_type_progress_id_fkey" foreign key ("id_progress") references "progress" ("id");
alter table "client_tech" add constraint "client_tech_client_id_fkey" foreign key ("id_client") references "client" ("id");
