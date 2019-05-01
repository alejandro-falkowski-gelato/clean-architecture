# Clean Architecture

Provides a demo of clean architecture in PHP.

## Background

For more on this please review the [following](https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html)

## Application

We will focus on the famous [TODO](https://github.com/tastejs/todomvc/blob/master/app-spec.md) application

### Development

#### Setup

Make sure you have the following setup:

```sh
brew install php
brew install composer
brew install postgres
```

#### Dependencies

To get the dependencies run:

```sh
make dependencies
```

#### Specs

To run the specs do:

```sh
make env=testing specs
```

#### Features

To run the features do:

```sh
make env=testing features
```

#### Formatting

```sh
make format
```

#### Analysis

```sh
make analysis
```
