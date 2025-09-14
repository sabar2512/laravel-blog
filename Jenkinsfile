
pipeline {
    agent {label 'devops-01-sabar'}

    stages {
        stage('pull source code') {
            steps {
                echo 'pull source code'
            }
        }
        stage('testing application') {
            steps {
                echo 'testing application'
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