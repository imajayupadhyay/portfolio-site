<template>
    <section id="skills" class="relative py-20 sm:py-28 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4 animate-fade-in-up">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                        <CodeBracketIcon class="w-4 h-4 mr-2" />
                        My Tech Stack
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up" style="animation-delay: 0.1s">
                    Skills & Technologies
                </h2>
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                    Expertise across cloud platforms, DevOps tools, and modern development technologies
                </p>
            </div>

            <!-- Skills Categories -->
            <div class="space-y-12">
                <!-- Cloud Platforms -->
                <div class="animate-fade-in-up" style="animation-delay: 0.3s">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full mr-3"></div>
                        Cloud Platforms
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                        <SkillCard
                            v-for="skill in cloudPlatforms"
                            :key="skill.name"
                            :skill="skill"
                        />
                    </div>
                </div>

                <!-- DevOps & Tools -->
                <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full mr-3"></div>
                        DevOps & Tools
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                        <SkillCard
                            v-for="skill in devOpsTools"
                            :key="skill.name"
                            :skill="skill"
                        />
                    </div>
                </div>

                <!-- Programming & Scripting -->
                <div class="animate-fade-in-up" style="animation-delay: 0.5s">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full mr-3"></div>
                        Programming & Scripting
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                        <SkillCard
                            v-for="skill in programmingLanguages"
                            :key="skill.name"
                            :skill="skill"
                        />
                    </div>
                </div>

                <!-- Web Development -->
                <div class="animate-fade-in-up" style="animation-delay: 0.6s">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full mr-3"></div>
                        Web Development
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                        <SkillCard
                            v-for="skill in webDevelopment"
                            :key="skill.name"
                            :skill="skill"
                        />
                    </div>
                </div>

                <!-- Monitoring & Logging -->
                <div class="animate-fade-in-up" style="animation-delay: 0.7s">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full mr-3"></div>
                        Monitoring & Logging
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        <SkillCard
                            v-for="skill in monitoringTools"
                            :key="skill.name"
                            :skill="skill"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { CodeBracketIcon } from '@heroicons/vue/24/outline';
import SkillCard from './SkillCard.vue';

const cloudPlatforms = [
    { name: 'AWS', icon: 'aws', color: '#FF9900' },
    { name: 'Azure', icon: 'azure', color: '#0089D6' },
    { name: 'Azure DevOps', icon: 'azuredevops', color: '#0078D7' },
    { name: 'DigitalOcean', icon: 'digitalocean', color: '#0080FF' },
    { name: 'Hostinger', icon: 'server', color: '#673DE6' },
];

const devOpsTools = [
    { name: 'Git', icon: 'git', color: '#F05032' },
    { name: 'GitHub', icon: 'github', color: '#181717' },
    { name: 'Docker', icon: 'docker', color: '#2496ED' },
    { name: 'Kubernetes', icon: 'kubernetes', color: '#326CE5' },
    { name: 'Terraform', icon: 'terraform', color: '#7B42BC' },
    { name: 'Ansible', icon: 'ansible', color: '#EE0000' },
];

const programmingLanguages = [
    { name: 'Python', icon: 'python', color: '#3776AB' },
    { name: 'JavaScript', icon: 'javascript', color: '#F7DF1E' },
    { name: 'PHP', icon: 'php', color: '#777BB4' },
    { name: 'Bash', icon: 'bash', color: '#4EAA25' },
    { name: 'Shell', icon: 'terminal', color: '#89E051' },
];

const webDevelopment = [
    { name: 'React.js', icon: 'react', color: '#61DAFB' },
    { name: 'Laravel', icon: 'laravel', color: '#FF2D20' },
    { name: 'WordPress', icon: 'wordpress', color: '#21759B' },
    { name: 'MySQL', icon: 'mysql', color: '#4479A1' },
    { name: 'NGINX', icon: 'nginx', color: '#009639' },
];

const monitoringTools = [
    { name: 'Azure Monitor', icon: 'monitor', color: '#0089D6' },
    { name: 'CloudWatch', icon: 'cloudwatch', color: '#FF9900' },
    { name: 'Prometheus', icon: 'prometheus', color: '#E6522C' },
    { name: 'Grafana', icon: 'grafana', color: '#F46800' },
];
</script>

<style scoped>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(-20px) scale(1.05);
    }
}

@keyframes float-delayed {
    0%, 100% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(20px) scale(1.05);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 6s ease-in-out infinite;
}
</style>
