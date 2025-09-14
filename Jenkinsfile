
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
        stage('code quality analysis') {
            steps {
                sh '''
                sonar-scanner \
                -Dsonar.projectKey=laravel-blog \
                -Dsonar.sources=. \
                -Dsonar.host.url=http://172.23.5.32:9000 \
                -Dsonar.token=sqp_320cc5f05301e15774f5186965f86887e8dd3471
                '''
            }
        }
        stage('build container image') {
            steps {
                sh '''
                docker compose build 
                '''
            }
        }
         stage('deploy container application') {
            steps {
                sh '''
                docker compose up -d 
                '''
            }
        }
         stage('publish container image') {
            steps {
                 sh '''
                docker compose push 
                '''
            }
        }
    }
}