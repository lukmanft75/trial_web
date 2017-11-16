ALTER TABLE `indottech_roles` ADD `approve_min` DOUBLE NOT NULL AFTER `role`, ADD `approve_max` DOUBLE NOT NULL AFTER `approve_min`;
UPDATE indottech_roles SET approve_min = '0',approve_max = '20000000', role = 'approver' WHERE role='approve_min';
UPDATE indottech_roles SET approve_min = '20000001',approve_max = '50000000', role = 'approver' WHERE role='approve_max';