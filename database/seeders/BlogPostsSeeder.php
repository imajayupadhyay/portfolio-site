<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $cloudCategory = BlogCategory::where('slug', 'cloud-computing')->first();
        $devopsCategory = BlogCategory::where('slug', 'devops')->first();

        $posts = [
            [
                'title' => 'Building Scalable Cloud Infrastructure with AWS and Terraform',
                'slug' => 'building-scalable-cloud-infrastructure-aws-terraform',
                'excerpt' => 'Learn how to design and implement a highly scalable, fault-tolerant infrastructure on AWS using Infrastructure as Code principles with Terraform.',
                'content' => '<h2>Introduction</h2>
<p>In today\'s rapidly evolving tech landscape, building scalable and maintainable infrastructure is crucial for any organization. This comprehensive guide will walk you through the process of setting up a robust cloud infrastructure using industry-standard tools and best practices.</p>

<h2>Prerequisites</h2>
<p>Before we dive in, make sure you have the following:</p>
<ul>
    <li>Basic understanding of cloud computing concepts</li>
    <li>An AWS account with appropriate permissions</li>
    <li>Terraform installed on your local machine (version 1.0 or higher)</li>
    <li>AWS CLI configured with your credentials</li>
</ul>

<h2>Setting Up Your Environment</h2>
<p>First, let\'s set up our development environment. We\'ll need to configure our AWS credentials and initialize our Terraform workspace.</p>

<pre><code>aws configure
terraform init
terraform plan</code></pre>

<h2>Infrastructure Architecture</h2>
<p>Our infrastructure will consist of multiple components working together to provide a highly available and scalable solution. Here\'s what we\'ll be building:</p>
<ul>
    <li><strong>VPC Configuration:</strong> Isolated network environment with public and private subnets</li>
    <li><strong>Auto Scaling Groups:</strong> Dynamic scaling based on demand</li>
    <li><strong>Load Balancers:</strong> Distribute traffic across multiple instances</li>
    <li><strong>RDS Database:</strong> Managed database with automatic backups</li>
    <li><strong>S3 Buckets:</strong> Object storage for static assets</li>
</ul>

<h2>Best Practices</h2>
<p>When working with infrastructure as code, keep these best practices in mind:</p>
<ol>
    <li>Always use version control for your Terraform configurations</li>
    <li>Implement state locking to prevent concurrent modifications</li>
    <li>Use modules to organize and reuse code</li>
    <li>Tag all resources for better organization and cost tracking</li>
    <li>Implement proper security groups and network ACLs</li>
</ol>

<h2>Monitoring and Maintenance</h2>
<p>Once your infrastructure is deployed, it\'s essential to monitor its health and performance. Set up CloudWatch alarms, enable logging, and establish a regular maintenance schedule.</p>

<h2>Conclusion</h2>
<p>Building scalable cloud infrastructure requires careful planning and implementation. By following the practices outlined in this guide, you\'ll be well on your way to creating a robust, maintainable infrastructure that can grow with your organization\'s needs.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1200&h=600&fit=crop',
                'blog_category_id' => $cloudCategory->id,
                'author' => 'Ajay Upadhyay',
                'tags' => ['AWS', 'Terraform', 'Infrastructure', 'DevOps', 'Cloud'],
                'read_time' => 8,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
                'meta_title' => 'Building Scalable Cloud Infrastructure with AWS and Terraform',
                'meta_description' => 'Learn how to design and implement a highly scalable, fault-tolerant infrastructure on AWS using Infrastructure as Code principles with Terraform.',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Mastering Kubernetes Deployments: Best Practices',
                'slug' => 'mastering-kubernetes-deployments-best-practices',
                'excerpt' => 'Discover essential best practices for deploying and managing containerized applications in production Kubernetes clusters.',
                'content' => '<h2>Introduction to Kubernetes Deployments</h2>
<p>Kubernetes has become the de facto standard for container orchestration. However, deploying applications effectively requires understanding best practices and common pitfalls. In this comprehensive guide, we\'ll explore the essential strategies for successful Kubernetes deployments.</p>

<h2>Understanding Deployments</h2>
<p>A Deployment in Kubernetes provides declarative updates for Pods and ReplicaSets. It allows you to describe the desired state of your application, and the Deployment Controller changes the actual state to the desired state at a controlled rate.</p>

<h3>Key Concepts</h3>
<ul>
    <li><strong>Pods:</strong> The smallest deployable units in Kubernetes</li>
    <li><strong>ReplicaSets:</strong> Ensures a specified number of pod replicas are running</li>
    <li><strong>Deployments:</strong> Manages ReplicaSets and provides declarative updates</li>
</ul>

<h2>Best Practices for Production</h2>

<h3>1. Resource Limits and Requests</h3>
<p>Always define resource limits and requests for your containers. This helps Kubernetes schedule pods efficiently and prevents resource exhaustion:</p>

<pre><code>resources:
  requests:
    memory: "64Mi"
    cpu: "250m"
  limits:
    memory: "128Mi"
    cpu: "500m"</code></pre>

<h3>2. Health Checks</h3>
<p>Implement both liveness and readiness probes to ensure your application is running correctly:</p>
<ul>
    <li><strong>Liveness Probe:</strong> Determines if a container is running</li>
    <li><strong>Readiness Probe:</strong> Determines if a container is ready to serve traffic</li>
</ul>

<h3>3. Rolling Updates</h3>
<p>Use rolling updates to deploy new versions without downtime. Configure the update strategy carefully:</p>

<pre><code>strategy:
  type: RollingUpdate
  rollingUpdate:
    maxSurge: 1
    maxUnavailable: 0</code></pre>

<h3>4. Configuration Management</h3>
<p>Use ConfigMaps for configuration data and Secrets for sensitive information. Never hard-code configuration in your images.</p>

<h2>Monitoring and Observability</h2>
<p>Set up proper monitoring using tools like Prometheus and Grafana. Track key metrics such as:</p>
<ul>
    <li>Pod restart counts</li>
    <li>Resource utilization</li>
    <li>Request rates and latencies</li>
    <li>Error rates</li>
</ul>

<h2>Security Considerations</h2>
<p>Security should be a top priority in production Kubernetes deployments:</p>
<ol>
    <li>Use RBAC (Role-Based Access Control) to manage permissions</li>
    <li>Implement Network Policies to control pod-to-pod communication</li>
    <li>Scan container images for vulnerabilities</li>
    <li>Use Pod Security Policies or Pod Security Standards</li>
    <li>Keep Kubernetes and all components up to date</li>
</ol>

<h2>Conclusion</h2>
<p>Mastering Kubernetes deployments takes time and practice. By following these best practices, you\'ll be able to deploy and manage containerized applications with confidence. Remember to continuously monitor your deployments and iterate on your processes as you learn what works best for your specific use cases.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?w=1200&h=600&fit=crop',
                'blog_category_id' => $devopsCategory->id,
                'author' => 'Ajay Upadhyay',
                'tags' => ['Kubernetes', 'DevOps', 'Containers', 'Deployment', 'Best Practices'],
                'read_time' => 10,
                'is_featured' => false,
                'is_active' => true,
                'order' => 2,
                'meta_title' => 'Mastering Kubernetes Deployments: Best Practices for Production',
                'meta_description' => 'Discover essential best practices for deploying and managing containerized applications in production Kubernetes clusters.',
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
