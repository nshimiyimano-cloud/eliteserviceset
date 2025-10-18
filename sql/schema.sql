-- Database schema for EliteServiceSet website
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(50),
  `message` TEXT NOT NULL,
  `attachment` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `projects` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `type` ENUM('Residential','Commercial') NOT NULL DEFAULT 'Residential',
  `description` TEXT,
  `image` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `services` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `short` VARCHAR(255),
  `details` TEXT,
  `icon` VARCHAR(100),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `team` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `role` VARCHAR(150),
  `bio` TEXT,
  `photo` VARCHAR(255),
  `social` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `client_name` VARCHAR(150) NOT NULL,
  `location` VARCHAR(150),
  `photo` VARCHAR(255),
  `story` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `admin` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(150) NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data
INSERT INTO services (title,short,details) VALUES
('Full Renovation','Complete home or office remodel','We handle design, demolition, and full re-build to create the perfect space.'),
('Kitchen Remodeling','Modern & functional kitchens','Cabinetry, countertops, appliances, and lighting tailored to your taste.'),
('Bathroom Remodeling','Spa-like bathrooms','From wet-room conversions to vanity upgrades and tiling.');

INSERT INTO team (name,role,bio,photo) VALUES
('Alice Johnson','Lead Designer','Alice leads the design team with 12 years experience in residential interiors.',''),
('Mark Taylor','Project Manager','Mark ensures projects are delivered on time and within budget.','');

INSERT INTO projects (title,slug,type,description,image) VALUES
('Cozy Modern Apartment','cozy-modern-apartment','Residential','A 2-bedroom apartment transformed with warm woods and minimalist fixtures.',''),
('Office Refurbishment Downtown','office-refurb-dt','Commercial','An open-plan office redesign for collaboration and brand alignment.','');

INSERT INTO testimonials (client_name,location,photo,story) VALUES
('Sarah Mwangi','Nairobi','', 'EliteServiceSet transformed my living room into a calm and elegant space. Professional and on time.'),
('John Doe','New York','', 'Excellent craftsmanship and attention to detail. Our kitchen remodel exceeded expectations.');

-- Update sample testimonials to reference local images (optional)
UPDATE testimonials SET photo = 'testi_sarah.jpg' WHERE client_name = 'Sarah Mwangi';
UPDATE testimonials SET photo = 'testi_john.jpg' WHERE client_name = 'John Doe';
