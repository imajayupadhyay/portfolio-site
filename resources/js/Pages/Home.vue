<template>
    <Head>
        <title>Ajay Upadhyay - Cloud & DevOps Engineer | AWS, Azure, DigitalOcean Expert</title>
        <meta name="description" content="Experienced Cloud & DevOps Engineer specializing in multi-cloud infrastructure (AWS, Azure, DigitalOcean), CI/CD automation, and scalable solutions. 3+ years of professional experience building reliable cloud systems." />
        <meta name="keywords" content="Ajay Upadhyay, Cloud Engineer, DevOps Engineer, AWS Solutions Architect, Azure Administrator, Multi-Cloud Infrastructure, CI/CD Pipelines, GitHub Actions, Jenkins, Azure DevOps, Docker, Kubernetes, Terraform, Infrastructure as Code, Cloud Automation" />
        <meta property="og:title" content="Ajay Upadhyay - Cloud & DevOps Engineer Portfolio" />
        <meta property="og:description" content="Professional portfolio showcasing cloud engineering expertise, certifications, and projects in AWS, Azure, and DevOps technologies." />
        <link rel="canonical" href="/" />
    </Head>

    <PortfolioLayout
        site-name="Ajay Upadhyay"
        logo-initial="A"
    >
        <!-- Hero Section -->
        <HeroSection :settings="heroSettings" />

        <!-- Certifications Section -->
        <CertificationsSection :certifications="certifications" :settings="certificationSettings" />

        <!-- Skills Section -->
        <SkillsSection :categories="skillCategories" :settings="formattedSkillsSettings" />

        <!-- Experience Section -->
        <ExperienceSection :experiences="experiences" :settings="experienceSettings" />

        <!-- Education Section -->
        <EducationSection />
    </PortfolioLayout>
</template>

<script setup>
import { computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import PortfolioLayout from '../Layouts/PortfolioLayout.vue';
import HeroSection from '../Components/Home/HeroSection.vue';
import CertificationsSection from '../Components/Home/CertificationsSection.vue';
import SkillsSection from '../Components/Home/SkillsSection.vue';
import ExperienceSection from '../Components/Home/ExperienceSection.vue';
import EducationSection from '../Components/Home/EducationSection.vue';

const props = defineProps({
    laravelVersion: String,
    certifications: {
        type: Array,
        default: () => []
    },
    certificationSettings: {
        type: Object,
        default: () => ({})
    },
    heroSettings: {
        type: Object,
        default: () => ({})
    },
    experiences: {
        type: Array,
        default: () => []
    },
    experienceSettings: {
        type: Object,
        default: () => ({})
    },
    skillCategories: {
        type: Array,
        default: () => []
    },
    skillsSettings: {
        type: Object,
        default: () => ({})
    }
});

const formattedSkillsSettings = computed(() => ({
    badge: props.skillsSettings.skills_badge || 'My Tech Stack',
    heading: props.skillsSettings.skills_heading || 'Skills & Technologies',
    description: props.skillsSettings.skills_description || 'Expertise across cloud platforms, DevOps tools, and modern development technologies'
}));
</script>
