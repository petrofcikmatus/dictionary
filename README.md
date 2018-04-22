# Muzirus

Source code of dictionary Muzirus.cz

[![Build Status Master](https://travis-ci.org/muzirus/muzirus.svg?branch=master)](https://travis-ci.org/muzirus/muzirus)
[![Build Status Develop](https://travis-ci.org/muzirus/muzirus.svg?branch=develop)](https://travis-ci.org/muzirus/muzirus)

## Requirements

- [PHP 7.1+](https://launchpad.net/~ondrej/+archive/ubuntu/php)
- [Composer](https://getcomposer.org/download/)
- [Node](https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions)
- [Yarn](https://yarnpkg.com/en/docs/install#linux-tab)
- [Git](https://git-scm.com/download/linux)

## Installation

### Clone repository

```bash
git clone git@github.com:muzirus/muzirus.git muzirus
```

### Go to project folder

```bash
cd muzirus
```

### Install PHP dependencies

```bash
composer prod
```

## Dev server

Install PHP dependencies with dev dependencies

```bash
composer dev
```

Install JS dependencies and build them

```bash
yarn install
```

Start server

```bash
bin/console server:start
```

Restart server

```bash
bin/console server:restart
```

Stop server

```bash
bin/console server:stop
```

Get status of server

```bash
bin/console server:status
```
