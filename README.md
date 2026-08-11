# Angelo & Caribbean Barbershop - Website Demo

Een moderne, responsieve website voor een heren barbershop, gebouwd met PHP 8.2, Nginx, en MySQL in Docker containers.

## 🚀 Quick Start

### Vereisten
- Docker & Docker Compose geïnstalleerd

### Start de applicatie

```bash
# Clone of navigeer naar de project map
cd barbershop

# Start de Docker containers (bouwt de PHP image met MySQL extensions)
docker compose up -d --build

# Wacht 30 seconden voor MySQL en PHP-FPM initialisatie
# Bezoek: http://localhost:8080
```

### Beschikbare URLs

| Pagina         | URL                     |
|----------------|-------------------------|
| Start          | http://localhost:8080/  |
| Over Ons       | http://localhost:8080/about |
| Diensten       | http://localhost:8080/services |
| Afspraak Maken | http://localhost:8080/appointment |
| Contact        | http://localhost:8080/contact |
| Reviews        | http://localhost:8080/reviews |

### Database via Adminer
- URL: http://localhost:8081
- Server: mysql
- Gebruiker: barbershop
- Wachtwoord: secret

> ⚠️ MySQL draait extern op poort **3307** (poort 3306 is gereserveerd voor je lokale MySQL). Intern gebruikt de PHP container poort 3306.

### Gebruikte poorten
| Service     | Poort   |
|-------------|---------|
| Website     | 8080    |
| Adminer (DB) | 8081   |
| MySQL       | 3307 → 3306 (intern) |

## 🏗️ Architectuur

```
barbershop/
├── docker-compose.yml      # Docker service definities
├── .env                    # Omgevingsvariabelen
├── public/                 # Web root (front controller)
│   ├── index.php           # Routing / front controller
│   ├── .htaccess           # Apache URL rewriting (fallback)
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript
│   └── images/             # Afbeeldingen
├── app/                    # Applicatie code (MVC)
│   ├── core/               # Core klassen (Router, Database, Controller, View)
│   ├── controllers/        # Pagina controllers
│   ├── models/             # Database modellen
│   ├── views/              # Template bestanden
│   ├── config.php          # Configuratie
│   └── helpers.php         # Helper functies
├── nginx/                  # Nginx configuratie
├── php/                    # PHP-FPM Docker image
└── mysql/                  # Database schema + seed data
```

## 🗄️ Database Schema

- `settings` - Algemene instellingen (naam, telefoon, adres, etc.)
- `services` - Diensten met categorie, prijs, en duur
- `appointments` - Afspraken met klantgegevens en service
- `contact_messages` - Contactformulier berichten
- `reviews` - Klant beoordelingen

## 🔧 Configuratie

Kopieer het voorbeeld env bestand:
```bash
cp .env.example .env
# Pas .env aan voor jouw omgeving
```

## 📝 Functionaliteiten

### SEO Optimalisatie
- Meta tags (title, description, keywords) per pagina
- Open Graph en Twitter Card tags
- JSON-LD structured data (Barbershop schema)
- Canonical URLs
- Robots meta tags (index, follow)

### Formulieren
- Afspraak maken (met datum/tijd picker)
- Contactformulier
- Review indienen
- CSRF beveiliging
- Client- en server-side validatie

### Responsive Design
- Mobile-first approach
- Hamburger menu voor mobiel
- Flexibele grid layouts
- Touch-vriendelijke formulieren
