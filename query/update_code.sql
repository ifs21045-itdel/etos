update fabric set code=(select code from fabric as f2 where fabric.id=f2.id)


ALTER TABLE public.purchaseorder_item ADD COLUMN line character varying;
ALTER TABLE public.shipment ADD COLUMN loadibility character varying;
ALTER TABLE public.products ADD COLUMN client_id integer;


ALTER TABLE public.purchaseorder ADD COLUMN po_client_no character varying;
ALTER TABLE public.purchaseorder ADD COLUMN ship_to text;
ALTER TABLE public.shipment ADD COLUMN tally_user character varying;

-- Alter SQL pada hot hot_cold_test_list
ALTER TABLE public.hot_cold_test_list
ADD COLUMN corrective_action_plan_image character varying,
ADD COLUMN condition_a_temp double precision,
ADD COLUMN condition_a_duration integer,
ADD COLUMN room_temp_rest_a_duration integer,
ADD COLUMN condition_b_temp double precision,
ADD COLUMN condition_b_duration integer,
ADD COLUMN room_temp_rest_b_duration integer,
ADD COLUMN cycles integer;

--alter table pada drop test list
ALTER TABLE public.drop_test_list
ADD COLUMN corrective_action_plan_image character varying;

--alter table pada hardness test list
ALTER TABLE public.drop_test_list
ADD COLUMN corrective_action_plan_image character varying;
