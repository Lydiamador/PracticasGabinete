import { Button } from "@/components/ui/button";
import { ChevronDown } from "lucide-react";
import { useState, useEffect } from "react";
import { createClient } from "@supabase/supabase-js";

const logoImage = "/lovable-uploads/f1a3799d-599c-4cb7-8a2b-05f9c9112e76.png";

// 🔹 Configura tu Supabase
const supabaseUrl = "https://pouiapnwlrhemfntvtxp.supabase.co";
const supabaseKey =
  "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBvdWlhcG53bHJoZW1mbnR2dHhwIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTkzOTIxNDEsImV4cCI6MjA3NDk2ODE0MX0.vFSwLOXNLu5xTzA0JJN1nV6m0BhQcKEnJBuK4VzETRw";
const supabase = createClient(supabaseUrl, supabaseKey);

export const Hero = () => {
  const [correo, setCorreo] = useState("");
  const [gdprAceptado, setGdprAceptado] = useState(false); // ✅ Checkbox GDPR
  const [mensaje, setMensaje] = useState("");
  const [mensajeColor, setMensajeColor] = useState("text-foreground/70");
  const [isLoaded, setIsLoaded] = useState(false);

  useEffect(() => {
    setIsLoaded(true);
  }, []);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    if (!correo) {
      setMensaje("Por favor, introduce un correo electrónico.");
      setMensajeColor("text-red-500");
      return;
    }

    if (!gdprAceptado) {
      setMensaje("Debes aceptar la política de protección de datos.");
      setMensajeColor("text-red-500");
      return;
    }

    // Insertar en la tabla correos_Beta
    const { error } = await supabase
      .from("correos_Beta")
      .insert([{ correo }]);

    if (error) {
      if (error.message.includes("duplicate key")) {
        setMensaje("Este correo ya está registrado.");
      } else if (error.message.includes("violates row-level security")) {
        setMensaje("Error de permisos: revisa la política RLS en Supabase.");
      } else {
        setMensaje("Ocurrió un error al registrar tu correo.");
      }
      setMensajeColor("text-red-500");
    } else {
      setMensaje("¡Gracias! Te has unido a la Beta.");
      setMensajeColor("text-green-500");
      setCorreo("");
      setGdprAceptado(false);
    }
  };

  return (
    <section className="relative min-h-screen flex flex-col items-center justify-center bg-aurora overflow-hidden">
      {/* Background */}
      <div className="absolute inset-0 opacity-30">
        <div className="absolute top-20 left-20 w-2 h-2 bg-brand-blue rounded-full animate-particle-float"></div>
        <div className="absolute top-40 right-32 w-1 h-1 bg-brand-purple rounded-full animate-particle-float-delayed"></div>
        <div className="absolute bottom-32 left-40 w-3 h-3 bg-brand-cyan rounded-full animate-particle-float-delayed-2"></div>
        <div className="absolute bottom-20 right-20 w-1 h-1 bg-brand-blue rounded-full animate-particle-float"></div>
      </div>

      {/* Logo */}
      <div className="mb-16 z-10">
        <div
          className={`w-24 h-24 mx-auto transition-all duration-800 ${
            isLoaded ? "animate-logo-breathe opacity-100" : "opacity-0"
          }`}
        >
          <img
            src={logoImage}
            alt="Tu&Tu Logo"
            className="w-full h-full object-contain"/>
        </div>
      </div>

      {/* Contenido principal */}
      <div className="container-grid text-center z-10 max-w-4xl mx-auto px-4 sm:px-6">
        <h1
          className={`font-display text-hero-responsive gradient-text mb-8 leading-[1.15] tracking-tight transition-all duration-1000 delay-200 ${
            isLoaded ? "animate-fade-in-up" : "opacity-0 translate-y-8"
          }`}
        >
          Protege su imagen.
          <p> Proteja su infancia.</p>
        </h1>

        <div
          className={`text-body-large text-foreground mb-10 font-inter leading-relaxed max-w-2xl mx-auto transition-all duration-1000 delay-300 ${
            isLoaded ? "animate-fade-in-up" : "opacity-0 translate-y-8"
          }`}
        >
          <strong className="text-destructive font-semibold">
            98% de los deepfakes son pornográficos.
          </strong>{" "}
          Menores, mujeres y colectivos vulnerables son la primera línea de
          fuego.
        </div>

        {/* Formulario Beta */}
        <div
          className={`mb-10 transition-all duration-1000 delay-400 ${
            isLoaded ? "animate-fade-in-up" : "opacity-0 translate-y-8"
          }`}
        >
          <div className="glass-panel-strong p-6 max-w-lg mx-auto">
            <form className="flex flex-col gap-4" onSubmit={handleSubmit}>
              <label htmlFor="hero-email" className="sr-only">
                Correo electrónico
              </label>
              <input
                id="hero-email"
                name="email"
                type="email"
                required
                placeholder="tu@email.com"
                value={correo}
                onChange={(e) => setCorreo(e.target.value)}
                className="w-full h-12 rounded-lg px-4 py-3 border-2 border-border bg-background text-foreground placeholder:text-muted-foreground focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 text-base"
              />

              <Button
                type="submit"
                className="w-full h-12 bg-gradient-primary hover:shadow-glow-primary text-white font-semibold rounded-lg text-base transition-all duration-300 hover:scale-[1.02] hover:-translate-y-0.5"
              >
                Únete a la Beta
              </Button>

              {/* Checkbox GDPR */}
              <label className="flex items-center gap-2 text-xs text-foreground/80 select-none">
                <input
                  type="checkbox"
                  checked={gdprAceptado}
                  onChange={(e) => setGdprAceptado(e.target.checked)}
                  className="w-2 h-2 accent-primary transform scale-50"
                />
                Acepto la política de protección de datos (GDPR)
              </label>
            </form>

            {mensaje && (
              <p className={`mt-3 text-sm font-medium text-center ${mensajeColor}`}>
                {mensaje}
              </p>
            )}

            <p className="mt-4 text-xs text-muted-foreground font-inter text-center">
              Sin spam · Cumplimos GDPR-K · Cupos limitados
            </p>
          </div>
        </div>

        <div
          className={`text-body text-foreground/90 mb-10 font-inter leading-relaxed max-w-2xl mx-auto transition-all duration-1000 delay-500 ${
            isLoaded ? "animate-fade-in-up" : "opacity-0 translate-y-8"
          }`}
        >
          Tu&Tu envenena las IA para que tus fotos sean inservibles para el
          abuso.
        </div>

        <div
          className={`transition-all duration-800 delay-600 ${
            isLoaded ? "animate-fade-in-up" : "opacity-0 translate-y-8"
          }`}
        >
          <Button
            variant="outline"
            size="lg"
            className="border-2 border-glass-border-strong bg-glass-bg backdrop-blur-premium text-foreground hover:bg-glass-bg-strong font-semibold px-8 py-3 text-base transition-all duration-300 hover:scale-105"
            onClick={() =>
              document
                .getElementById("investor-download-button")
                ?.scrollIntoView({ behavior: "smooth" })
            }
          >
            One-Pager inversores
          </Button>
        </div>

        <p
          className={`text-sm text-foreground/60 font-inter mt-6 transition-all duration-1000 delay-700 ${
            isLoaded ? "animate-fade-in-up" : "opacity-0 translate-y-8"
          }`}
        >
          Descubre cómo cuidamos a los más vulnerables.
        </p>
      </div>

      {/* Indicador Scroll */}
      <div
        className={`absolute bottom-8 left-1/2 transform -translate-x-1/2 transition-all duration-800 delay-1000 ${
          isLoaded ? "animate-fade-in-up" : "opacity-0"
        }`}
      >
        <div className="flex flex-col items-center gap-2">
          <div className="w-6 h-10 border-2 border-foreground/20 rounded-full flex justify-center">
            <div className="w-1 h-3 bg-gradient-primary rounded-full mt-2 animate-pulse-premium"></div>
          </div>
          <ChevronDown className="w-5 h-5 text-foreground/40 animate-bounce" />
        </div>
      </div>
    </section>
  );
};
