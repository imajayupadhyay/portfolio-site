<template>
    <PortfolioLayout
        site-name="Ajay Upadhyay"
        logo-initial="A"
    >
        <!-- Hero Section -->
        <HeroSection />

        <!-- Certifications Section -->
        <CertificationsSection />

        <!-- Skills Section -->
        <SkillsSection />

        <!-- Experience Section -->
        <ExperienceSection />

        <!-- Education Section -->
        <EducationSection />
    </PortfolioLayout>
</template>

<script setup>
import PortfolioLayout from '../Layouts/PortfolioLayout.vue';
import HeroSection from '../Components/Home/HeroSection.vue';
import CertificationsSection from '../Components/Home/CertificationsSection.vue';
import SkillsSection from '../Components/Home/SkillsSection.vue';
import ExperienceSection from '../Components/Home/ExperienceSection.vue';
import EducationSection from '../Components/Home/EducationSection.vue';

defineProps({
    laravelVersion: String,
});
</script>
