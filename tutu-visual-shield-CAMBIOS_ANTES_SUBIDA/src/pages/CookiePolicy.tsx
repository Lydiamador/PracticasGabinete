import { useEffect } from "react";

const CookiePolicy = () => {
  useEffect(() => {
    document.title = "Política de Cookies - Tu&Tu";

    const metaDescription = document.querySelector('meta[name="description"]');
    if (metaDescription) {
      metaDescription.setAttribute(
        "content",
        "Política de cookies de Tu&Tu - Información sobre el uso de cookies en nuestro sitio web de protección de imágenes contra deepfakes."
      );
    } else {
      const meta = document.createElement("meta");
      meta.name = "description";
      meta.content =
        "Política de cookies de Tu&Tu - Información sobre el uso de cookies en nuestro sitio web de protección de imágenes contra deepfakes.";
      document.getElementsByTagName("head")[0].appendChild(meta);
    }
  }, []);

  return (
    <div className="min-h-screen bg-background text-foreground">
      {/* Header Section */}
      <div className="section-padding bg-background-secondary border-b border-border/20">
        <div className="container-grid">
          <div className="text-center max-w-3xl mx-auto">
            <h1 className="font-display text-4xl sm:text-5xl gradient-text mb-6">
              Política de Cookies
            </h1>
            <p className="text-sm text-foreground/60">
              Fecha de entrada en vigor: 14 de julio de 2025
            </p>
          </div>
        </div>
      </div>

      {/* Content Section */}
      <div className="section-padding">
        <div className="container-grid">
          <div className="max-w-4xl mx-auto">
            <div className="space-y-8">

              {/* 1. Qué son las cookies */}
              <section className="space-y-4">
                <h2 className="font-display text-2xl gradient-text">1. ¿Qué son las cookies?</h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio web. Permiten al sitio recordar tus preferencias, mejorar la experiencia de usuario y ofrecer contenido personalizado.
                  </p>
                </div>
              </section>

              {/* 2. Tipos de cookies */}
              <section className="space-y-4">
                <h2 className="font-display text-2xl gradient-text">2. ¿Qué tipos de cookies utilizamos?</h2>

                {/* Cookies técnicas */}
                <div className="glass-panel p-6">
                  <h3 className="font-semibold text-foreground mb-2">Cookies técnicas:</h3>
                  <p className="text-foreground/80 leading-relaxed">
                    Esenciales para el funcionamiento básico del sitio web. Permiten la navegación, el uso de formularios y funcionalidades básicas.
                  </p>
                </div>

                {/* Cookies de personalización */}
                <div className="glass-panel p-6">
                  <h3 className="font-semibold text-foreground mb-2">Cookies de personalización:</h3>
                  <p className="text-foreground/80 leading-relaxed">
                    Permiten recordar información como el idioma, el tipo de navegador o la configuración regional del usuario.
                  </p>
                </div>

                {/* Cookies analíticas */}
                <div className="glass-panel p-6">
                  <h3 className="font-semibold text-foreground mb-2">Cookies analíticas:</h3>
                  <p className="text-foreground/80 leading-relaxed">
                    Recogen información sobre cómo los usuarios interactúan con la web, como páginas visitadas, tiempo de permanencia o errores detectados. Esta información es anónima y nos ayuda a mejorar la usabilidad.
                  </p>
                </div>
              </section>

              {/* 3. Cómo gestionar cookies */}
              <section className="space-y-4">
                <h2 className="font-display text-2xl gradient-text">3. ¿Cómo puedes gestionar tus cookies?</h2>
                <div className="glass-panel p-6 space-y-4">
                  <p className="text-foreground/80 leading-relaxed">
                    Al ingresar por primera vez a nuestro sitio, se mostrará un banner de consentimiento para que puedas:
                  </p>
                  <ul className="list-disc list-inside space-y-2 text-foreground/80 ml-4">
                    <li>Aceptar todas las cookies.</li>
                    <li>Rechazar todas las cookies no esenciales.</li>
                    <li>Configurar tus preferencias de forma personalizada.</li>
                  </ul>
                  <p className="text-foreground/80 leading-relaxed">
                    Puedes modificar tu configuración de cookies en cualquier momento desde la sección de ajustes de tu navegador. También puedes eliminar las cookies almacenadas previamente.
                  </p>
                  <p className="text-foreground/80 leading-relaxed">
                    Ten en cuenta que desactivar algunas cookies puede afectar negativamente el funcionamiento de determinadas funcionalidades del sitio web.
                  </p>
                </div>
              </section>

              {/* 4. Tiempo de conservación */}
              <section className="space-y-4">
                <h2 className="font-display text-2xl gradient-text">4. ¿Durante cuánto tiempo conservamos las cookies?</h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    El tiempo de conservación varía según el tipo de cookie, pero nunca se mantendrán más allá de lo estrictamente necesario para los fines descritos. Las cookies persistentes pueden permanecer en tu dispositivo hasta 24 meses, salvo que las elimines antes.
                  </p>
                </div>
              </section>

              {/* 5. Cumplimiento normativo */}
              <section className="space-y-4">
                <h2 className="font-display text-2xl gradient-text">5. Cumplimiento normativo</h2>
                <div className="glass-panel p-6">
                  <ul className="list-disc list-inside space-y-2 text-foreground/80 ml-4">
                    <li>Reglamento General de Protección de Datos (RGPD).</li>
                    <li>Ley de Servicios de la Sociedad de la Información y Comercio Electrónico (LSSI-CE).</li>
                  </ul>
                </div>
              </section>

              {/* 6. Contacto */}
              <section className="space-y-4">
                <h2 className="font-display text-2xl gradient-text">6. Contacto</h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    Si tienes dudas sobre el uso de cookies en nuestro sitio web o deseas ejercer tus derechos en materia de protección de datos, puedes escribirnos a:{" "}
                    <a 
                      href="mailto:privacidad@tuytu.tech" 
                      className="text-primary hover:text-primary/80 transition-colors duration-200"
                    >
                      privacidad@tuytu.tech
                    </a>
                  </p>
                  <p className="text-muted-foreground text-sm mt-4">
                    Última actualización: 14 de julio de 2025
                  </p>
                </div>
              </section>

            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CookiePolicy;
