**Required ENV variables**
SYMFONY__ANNEX__POSTMARK_API_KEY
RDS_URL for production
DEV_DB_USER for dev
DEV_DB_PASS for dev
BRIGHTPEARL_SECRET
STRIPE_PRIVATE_KEY
STRIPE_PUBLIC_KEY
STRIPE_PRIVATE_KEY_TEST
STRIPE_PUBLIC_KEY_TEST

**Tenant deployment**
```mysql
DROP DATABASE IF EXISTS analyst_core;
DROP DATABASE IF EXISTS analyst_yosemite;

CREATE DATABASE analyst_core CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE analyst_core.tenant_invoice (id INT AUTO_INCREMENT NOT NULL, tenant INT DEFAULT NULL, stripe_id VARCHAR(64) NOT NULL, tax_date DATETIME NOT NULL, amount INT NOT NULL, currency VARCHAR(3) NOT NULL, is_paid TINYINT(1) NOT NULL, INDEX IDX_82F355704E59C462 (tenant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
CREATE TABLE analyst_core.tenant_plan (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(32) NOT NULL, amount INT NOT NULL, name VARCHAR(32) NOT NULL, description VARCHAR(1024) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
CREATE TABLE analyst_core.tenant_subscription (id INT AUTO_INCREMENT NOT NULL, tenant INT DEFAULT NULL, plan INT DEFAULT NULL, status VARCHAR(16) NOT NULL, amount INT NOT NULL, currency VARCHAR(3) NOT NULL, created_at DATETIME NOT NULL, canceled_at DATETIME DEFAULT NULL, stripe_id VARCHAR(255) DEFAULT NULL, INDEX IDX_47105EB24E59C462 (tenant), INDEX IDX_47105EB2DD5A5B7D (plan), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE `analyst_core`.`tenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription` int(11) DEFAULT NULL,
  `stub` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `db_schema` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brightpearl_account_code` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brightpearl_data_centre` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `last_access_at` datetime DEFAULT NULL,
  `trial_expires_at` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brightpearl_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4E59C462FAC29D25` (`stub`),
  UNIQUE KEY `UNIQ_4E59C462A3C664D3` (`subscription`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE analyst_core.tenant_invoice ADD CONSTRAINT FK_82F355704E59C462 FOREIGN KEY (tenant) REFERENCES analyst_core.tenant (id);
ALTER TABLE analyst_core.tenant_subscription ADD CONSTRAINT FK_47105EB24E59C462 FOREIGN KEY (tenant) REFERENCES analyst_core.tenant (id);
ALTER TABLE analyst_core.tenant_subscription ADD CONSTRAINT FK_47105EB2DD5A5B7D FOREIGN KEY (plan) REFERENCES analyst_core.tenant_plan (id);
ALTER TABLE analyst_core.tenant_invoice AUTO_INCREMENT = 1000;

```