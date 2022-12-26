pipeline {  
  agent any 
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))   
  }
  stages {
    stage('Build Image') {
        steps {
            script {
                if (env.BRANCH_NAME == 'dev') {                     
            sh 'docker build -t triagungtio/blogx:0.0.$BUILD_NUMBER-dev .'
                }
                 else if (env.BRANCH_NAME == 'staging') {
            sh 'docker build -t triagungtio/blogx:0.0.$BUILD_NUMBER-staging .'
                }
                else if (env.BRANCH_NAME == 'main') {
            sh 'docker build -t triagungtio/blogx:0.0.$BUILD_NUMBER-main .'
                }
                else {
                    sh 'echo Nothing to Build'
                }
            }
        }
    }
    stage('Push to Registry') {
        steps {
            script {
             if (env.BRANCH_NAME == 'dev') {
            sh 'docker push triagungtio/blogx:0.0.$BUILD_NUMBER-dev'
                }
                else if (env.BRANCH_NAME == 'staging') {
            sh 'docker push triagungtio/blogx:0.0.$BUILD_NUMBER-staging' 
                }
                else if (env.BRANCH_NAME == 'main') {
            sh 'docker push triagungtio/blogx:0.0.$BUILD_NUMBER-main' 
                }
                else {
                    sh 'echo Nothing to Push'
                }
        }
      }
    }
    stage('Deploy to Kubernetes Cluster') {
        steps {
        script {
             if (env.BRANCH_NAME == 'dev') {
            withKubeConfig(caCertificate: '', clusterName: '', contextName: '', credentialsId: 'k8s', namespace: '', serverUrl: '') {
            sh "kubectl apply -f deployment/dev/namespace.yaml"
            sh "kubectl apply -f deployment/dev/configmap.yaml"
            sh "kubectl apply -f deployment/dev/db.yaml"
            sh "kubectl apply -f deployment/dev/app.yaml"
                 }
                }
                else if (env.BRANCH_NAME == 'staging') {
                    sh 'echo Nothing to deploy'
                }
                else if (env.BRANCH_NAME == 'main') {
                    sh 'echo Nothing to deploy'
                }
                else {
                    sh 'echo Nothing to deploy'
                }
        }
      }
    } 
}
        post {
            success {
                slackSend channel: '#jenkins',
                color: 'good',
                message: "*${currentBuild.currentResult}:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER}\n More info at: ${env.BUILD_URL}"
            }    

            failure {
                slackSend channel: '#jenkins',
                color: 'danger',
                message: "*${currentBuild.currentResult}:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER}\n More info at: ${env.BUILD_URL}"
                }

        }
}

