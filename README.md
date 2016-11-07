**Required ENV variables**
SYMFONY__ANNEX__POSTMARK_API_KEY
RDS_URL for production
DEV_DB_USER for dev
DEV_DB_PASS for dev
BRIGHTPEARL_SECRET

**Tenant deployment**
```mysql
DROP DATABASE IF EXISTS notifier_core;
DROP DATABASE IF EXISTS notifier_yosemite;

CREATE DATABASE notifier_core CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE notifier_core.tenant_plan (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(32) NOT NULL, amount INT NOT NULL, name VARCHAR(32) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
CREATE TABLE notifier_core.tenant_subscription (id INT AUTO_INCREMENT NOT NULL, tenant INT DEFAULT NULL, plan INT DEFAULT NULL, status VARCHAR(16) NOT NULL, amount INT NOT NULL, currency VARCHAR(3) NOT NULL, created_at DATETIME NOT NULL, canceled_at DATETIME NOT NULL, stripe_id VARCHAR(255) DEFAULT NULL, INDEX IDX_47105EB24E59C462 (tenant), INDEX IDX_47105EB2DD5A5B7D (plan), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
CREATE TABLE notifier_core.tenant (id INT AUTO_INCREMENT NOT NULL, subscription INT DEFAULT NULL, stub VARCHAR(32) NOT NULL, name VARCHAR(255) NOT NULL, owner_name VARCHAR(255) NOT NULL, owner_email VARCHAR(255) NOT NULL, db_schema VARCHAR(255) DEFAULT NULL, brightpearl_account_code VARCHAR(128) NOT NULL, brightpearl_data_centre VARCHAR(6) NOT NULL, created_at DATETIME NOT NULL, last_access_at DATETIME DEFAULT NULL, status VARCHAR(255) NOT NULL, brightpearl_token VARCHAR(255) DEFAULT NULL, stripe_customer_id VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_4E59C462FAC29D25 (stub), UNIQUE INDEX UNIQ_4E59C462A3C664D3 (subscription), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
ALTER TABLE notifier_core.tenant_subscription ADD CONSTRAINT FK_47105EB24E59C462 FOREIGN KEY (tenant) REFERENCES notifier_core.tenant (id);
ALTER TABLE notifier_core.tenant_subscription ADD CONSTRAINT FK_47105EB2DD5A5B7D FOREIGN KEY (plan) REFERENCES notifier_core.tenant_plan (id);
ALTER TABLE notifier_core.tenant ADD CONSTRAINT FK_4E59C462A3C664D3 FOREIGN KEY (subscription) REFERENCES notifier_core.tenant_subscription (id);
```