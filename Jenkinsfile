
pipeline {
    agent {label 'devops-01-sabar'}

    stages {
        stage('pull source code') {
            steps {
                git branch: 'main', url: 'https://github.com/sabar2512/laravel-blog.git'
            }
        }
        stage('copy env variables') {
            steps {
                sh '''
                cp /usr/share/nginx/html/laravel-blog/.env .env
                '''
            }
        }
        stage('testing application') {
            steps {
                sh '''
                composer install --dev --optimize-autoloader
                composer require fakerphp/faker --dev
                php artisan test
                '''
            }
        }
        stage('build container image') {
            steps {
                echo 'build container image'
            }
        }
         stage('deploy container application') {
            steps {
                echo 'build container application'
            }
        }
         stage('publish container image') {
            steps {
                echo 'publish container image'
            }
        }
    }
}