<template>
    <section id="certifications" class="relative py-20 sm:py-28 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-white to-gray-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4 animate-fade-in-up">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                        <AcademicCapIcon class="w-4 h-4 mr-2" />
                        Professional Certifications
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up" style="animation-delay: 0.1s">
                    Industry Certifications
                </h2>
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                    Validated expertise in cloud computing and DevOps practices
                </p>
            </div>

            <!-- Certifications Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- AWS Certification -->
                <div
                    class="group relative animate-fade-in-up"
                    style="animation-delay: 0.3s"
                >
                    <div class="relative h-full bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                        <!-- Gradient Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <!-- Badge Icon -->
                            <div class="mb-6">
                                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-orange-500 to-yellow-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                    <svg class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M13.983 11.078h2.119a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.119a.185.185 0 00-.185.185v1.888c0 .102.083.185.185.185m-2.954-5.43h2.118a.186.186 0 00.186-.186V3.574a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185m0 2.716h2.118a.187.187 0 00.186-.186V6.29a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.887c0 .102.082.186.185.186m-2.93 0h2.12a.186.186 0 00.184-.186V6.29a.185.185 0 00-.185-.185H8.1a.185.185 0 00-.185.185v1.887c0 .102.083.186.185.186m-2.964 0h2.119a.186.186 0 00.185-.186V6.29a.185.185 0 00-.185-.185H5.136a.186.186 0 00-.186.185v1.887c0 .102.084.186.186.186m5.893 2.715h2.118a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185m-2.93 0h2.12a.185.185 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.184.185v1.888c0 .102.083.185.185.185m-2.964 0h2.119a.185.185 0 00.185-.185V9.006a.185.185 0 00-.184-.186h-2.12a.186.186 0 00-.186.186v1.887c0 .102.084.185.186.185m-2.92 0h2.12a.185.185 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.184.185v1.888c0 .102.082.185.185.185M23.763 9.89c-.065-.051-.672-.51-1.954-.51-.338 0-.676.03-1.01.09-.808-1.197-1.695-2.314-2.654-3.348-.238-.257-.513-.48-.802-.666l-.547-.35-.354.55a4.56 4.56 0 00-.624 1.738 3.42 3.42 0 00.44 2.15c-.628.37-1.296.66-1.996.87-.65.186-1.312.28-1.975.28H.026l-.013.143a9.512 9.512 0 00.093 1.753c.198 1.607.765 3.06 1.684 4.318.897 1.23 2.074 2.196 3.494 2.87 1.396.664 2.976 1.003 4.697 1.003 1.06 0 2.115-.136 3.137-.407 1.668-.441 3.199-1.215 4.55-2.3 1.29-1.037 2.383-2.323 3.248-3.82.724-1.252 1.24-2.605 1.535-4.023.168-.01.336-.017.504-.017 1.527 0 2.478.483 2.734.73.187.178.324.394.405.636l.283-.038.039-.276c.054-.385.097-.771.127-1.158a9.44 9.44 0 00.04-1.014l-.013-.025-.045-.01z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Certification Info -->
                            <div class="text-center mb-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                    AWS Certified Developer
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                    Associate Level
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 font-mono">
                                    DVA-C02
                                </p>
                            </div>

                            <!-- Provider -->
                            <div class="flex items-center justify-center mb-6">
                                <div class="px-4 py-2 bg-gradient-to-r from-orange-500/10 to-yellow-500/10 rounded-full border border-orange-500/20">
                                    <span class="text-sm font-medium text-orange-600 dark:text-orange-400">Amazon Web Services</span>
                                </div>
                            </div>

                            <!-- Verify Button -->
                            <a
                                href="#"
                                class="flex items-center justify-center w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-yellow-500 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                            >
                                <ShieldCheckIcon class="w-5 h-5 mr-2" />
                                Verify Credential
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Azure Administrator Certification -->
                <div
                    class="group relative animate-fade-in-up"
                    style="animation-delay: 0.4s"
                >
                    <div class="relative h-full bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                        <!-- Gradient Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <!-- Badge Icon -->
                            <div class="mb-6">
                                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                    <svg class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.315 10.3l3.133 12.048L1.24 20.39l12.251-1.669zm14.944-4.156L14.206 2 8.297 13.903l4.922 1.841 6.606-7.226z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Certification Info -->
                            <div class="text-center mb-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                    Azure Administrator
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                    Associate Level
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 font-mono">
                                    AZ-104
                                </p>
                            </div>

                            <!-- Provider -->
                            <div class="flex items-center justify-center mb-6">
                                <div class="px-4 py-2 bg-gradient-to-r from-blue-500/10 to-cyan-500/10 rounded-full border border-blue-500/20">
                                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">Microsoft Azure</span>
                                </div>
                            </div>

                            <!-- Verify Button -->
                            <a
                                href="#"
                                class="flex items-center justify-center w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                            >
                                <ShieldCheckIcon class="w-5 h-5 mr-2" />
                                Verify Credential
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Azure Fundamentals Certification -->
                <div
                    class="group relative animate-fade-in-up md:col-span-2 lg:col-span-1"
                    style="animation-delay: 0.5s"
                >
                    <div class="relative h-full bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                        <!-- Gradient Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <!-- Badge Icon -->
                            <div class="mb-6">
                                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                    <svg class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.315 10.3l3.133 12.048L1.24 20.39l12.251-1.669zm14.944-4.156L14.206 2 8.297 13.903l4.922 1.841 6.606-7.226z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Certification Info -->
                            <div class="text-center mb-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                    Azure Fundamentals
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                    Foundational Level
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 font-mono">
                                    AZ-900
                                </p>
                            </div>

                            <!-- Provider -->
                            <div class="flex items-center justify-center mb-6">
                                <div class="px-4 py-2 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 rounded-full border border-indigo-500/20">
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400">Microsoft Azure</span>
                                </div>
                            </div>

                            <!-- Verify Button -->
                            <a
                                href="#"
                                class="flex items-center justify-center w-full px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                            >
                                <ShieldCheckIcon class="w-5 h-5 mr-2" />
                                Verify Credential
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { AcademicCapIcon, ShieldCheckIcon } from '@heroicons/vue/24/outline';
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
