import { Hero } from "@/components/Hero";
import { PainStats } from "@/components/PainStats";
import { Gallery } from "@/components/Gallery";
import { HowItWorks } from "@/components/HowItWorks";
import { CompetitiveTable } from "@/components/CompetitiveTable";
import { UseCases } from "@/components/UseCases";
import { Partners } from "@/components/Partners";
import { Roadmap } from "@/components/Roadmap";
import { FamilyGuide } from "@/components/FamilyGuide";
import { BetaSignup } from "@/components/BetaSignup";
import { CallToAction } from "@/components/CallToAction";
import { Footer } from "@/components/Footer";
import { useEffect } from "react";

const Index = () => {
  useEffect(() => {
    // SEO Meta Tags
    document.title = "Tu&Tu – Protección de imágenes contra IA | Desentrenamiento";

    const metaDescription = document.querySelector('meta[name="description"]');
    if (metaDescription) {
      metaDescription.setAttribute('content', 'Tu&Tu protege imágenes reales del abuso de IA mediante desentrenamiento. Tecnología única para menores y colectivos vulnerables. Beta gratuita disponible.');
    }

    // Función para agregar meta tags
    const addMetaTag = (name: string, content: string) => {
      let meta = document.querySelector(`meta[name="${name}"]`);
      if (!meta) {
        meta = document.createElement('meta');
        meta.setAttribute('name', name);
        document.head.appendChild(meta);
      }
      meta.setAttribute('content', content);
    };

    addMetaTag('keywords', 'protección de imágenes, IA, desentrenamiento, deepfakes, menores, algoritmos deterministas, privacidad digital');
    addMetaTag('author', 'Tu&Tu');
    addMetaTag('robots', 'index, follow');
    addMetaTag('viewport', 'width=device-width, initial-scale=1');

    // Open Graph
    addMetaTag('og:title', 'Tu&Tú – Protección de imágenes contra IA | Desentrenamiento');
    addMetaTag('og:description', 'Protege imágenes reales del abuso de IA mediante desentrenamiento. Para menores y colectivos vulnerables.');
    addMetaTag('og:type', 'website');
    addMetaTag('og:url', window.location.href);
    addMetaTag('og:site_name', 'Tu&Tu');

    // Twitter Cards
    addMetaTag('twitter:card', 'summary_large_image');
    addMetaTag('twitter:title', 'Tu&Tú – Protección de imágenes contra IA | Desentrenamiento');
    addMetaTag('twitter:description', 'Protege imágenes reales del abuso de IA mediante desentrenamiento.');

    // Structured Data
    const structuredData = {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "Tu&Tu",
      "description": "Plataforma de protección digital que protege imágenes reales mediante desentrenamiento de IA. Especializada en menores y colectivos vulnerables.",
      "applicationCategory": "SecurityApplication",
      "operatingSystem": "Web",
      "url": "https://tuytu.nextai.pro",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "EUR"
      },
      "creator": {
        "@type": "Organization",
        "name": "Tu&Tu",
        "url": "https://tuytu.nextai.pro"
      }
    };

    let jsonLd = document.querySelector('script[type="application/ld+json"]') as HTMLScriptElement;
    if (!jsonLd) {
      jsonLd = document.createElement('script');
      jsonLd.type = 'application/ld+json';
      document.head.appendChild(jsonLd);
    }
    jsonLd.textContent = JSON.stringify(structuredData);

    // Preconnect y fonts
    const preconnectGoogle = document.createElement('link');
    preconnectGoogle.rel = 'preconnect';
    preconnectGoogle.href = 'https://fonts.googleapis.com';
    document.head.appendChild(preconnectGoogle);

    const preconnectGstatic = document.createElement('link');
    preconnectGstatic.rel = 'preconnect';
    preconnectGstatic.href = 'https://fonts.gstatic.com';
    preconnectGstatic.crossOrigin = 'anonymous';
    document.head.appendChild(preconnectGstatic);

    const fontLink = document.createElement('link');
    fontLink.rel = 'stylesheet';
    fontLink.href = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap';
    document.head.appendChild(fontLink);

    return () => {
      document.head.removeChild(preconnectGoogle);
      document.head.removeChild(preconnectGstatic);
      document.head.removeChild(fontLink);
    };
  }, []);

  return (
    <div className="min-h-screen bg-background text-foreground overflow-x-hidden pt-16">
      <Hero />
      <PainStats />
      <Gallery />
      <HowItWorks />
      <CompetitiveTable />
      <UseCases />
      <Partners />
      <Roadmap />
      <FamilyGuide />
      <BetaSignup />
      <CallToAction />
      <Footer />
    </div>
  );
};

export default Index;
