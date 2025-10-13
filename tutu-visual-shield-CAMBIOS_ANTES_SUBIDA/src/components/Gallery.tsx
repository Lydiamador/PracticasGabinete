import { useEffect, useRef, useState } from "react";
import { Button } from "@/components/ui/button";
import { X } from "lucide-react";

export const Gallery = () => {
  const [isVisible, setIsVisible] = useState(false);
  const [selectedImage, setSelectedImage] = useState<number | null>(null);
  const sectionRef = useRef<HTMLElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
        }
      },
      { threshold: 0.2 }
    );
    if (sectionRef.current) observer.observe(sectionRef.current);
    return () => observer.disconnect();
  }, []);

  const images = [
    {
      src: "/lovable-uploads/e7eb1160-3d58-42cc-b19f-b45d69988991.png",
      alt: "Uso nocturno de dispositivos - Escenario 1",
    },
    {
      src: "/lovable-uploads/c53fdb40-3d1f-449e-a05d-722c5b9931e9.png",
      alt: "Uso nocturno de dispositivos - Escenario 2",
    },
    {
      src: "/lovable-uploads/306807e7-1b99-4109-93b7-a2f84c44bfc7.png",
      alt: "Uso nocturno de dispositivos - Escenario 3",
    },
  ];

  const openModal = (index: number) => {
    setSelectedImage(index);
    document.body.style.overflow = "hidden";
  };

  const closeModal = () => {
    setSelectedImage(null);
    document.body.style.overflow = "unset";
  };

  const nextImage = () => {
    if (selectedImage !== null) {
      setSelectedImage((selectedImage + 1) % images.length);
    }
  };

  const prevImage = () => {
    if (selectedImage !== null) {
      setSelectedImage(selectedImage === 0 ? images.length - 1 : selectedImage - 1);
    }
  };

  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      if (selectedImage !== null) {
        if (e.key === "Escape") closeModal();
        if (e.key === "ArrowRight") nextImage();
        if (e.key === "ArrowLeft") prevImage();
      }
    };
    window.addEventListener("keydown", handleKeyDown);
    return () => window.removeEventListener("keydown", handleKeyDown);
  }, [selectedImage]);

  return (
    <section ref={sectionRef} className="section-padding bg-background">
      <div className="container-grid">
        {/* Section Header */}
        <div className="text-center mb-16">
          <div
            className={`mb-8 transition-all duration-800 ${
              isVisible ? "animate-fade-in-up" : "opacity-0"
            }`}
          >
            <div className="glass-panel p-8 max-w-4xl mx-auto">
              <h2 className="font-display text-display text-foreground mb-6 gradient-text">
                "No es un simple filtro: es la primera línea de defensa antes de que la herida ocurra."
              </h2>
              <div className="w-16 h-1 bg-primary mx-auto mb-6"></div>
            </div>
          </div>
        </div>

        {/* Gallery Grid */}
        <div
          className={`grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-16 transition-all duration-800 delay-600 ${
            isVisible ? "animate-fade-in-up" : "opacity-0"
          }`}
        >
          {images.map((image, index) => (
            <div
              key={index}
              className="glass-panel overflow-hidden hover-lift cursor-pointer group"
              onClick={() => openModal(index)}
            >
              <div className="relative w-full aspect-[3/4]">
                <img
                  src={image.src}
                  alt={image.alt}
                  className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  loading="lazy"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-background/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div className="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <p className="text-foreground text-sm font-medium">Ver imagen completa</p>
                </div>
              </div>
            </div>
          ))}
        </div>

{/* Modal */}
{selectedImage !== null && (
  <div className="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-md p-4">
    <div className="relative max-w-[95vw] max-h-[90vh] w-full flex items-center justify-center">
      {/* Botón cerrar */}
      <Button
        variant="outline"
        size="icon"
        className="absolute top-4 right-4 z-10 glass-panel"
        onClick={closeModal}
      >
        <X className="h-4 w-4" />
      </Button>

      {/* Imagen */}
      <img
        src={images[selectedImage].src}
        alt={images[selectedImage].alt}
        className="max-w-full max-h-[90vh] w-auto h-auto object-contain rounded-lg"
      />

      {/* Navegación */}
      <Button
        variant="outline"
        className="absolute left-2 top-1/2 -translate-y-1/2 glass-panel sm:left-4"
        onClick={prevImage}
      >
        ←
      </Button>
      <Button
        variant="outline"
        className="absolute right-2 top-1/2 -translate-y-1/2 glass-panel sm:right-4"
        onClick={nextImage}
      >
        →
      </Button>

              {/* Counter */}
              <div className="absolute bottom-4 left-1/2 -translate-x-1/2 glass-panel px-4 py-2 rounded-full">
                <span className="text-sm text-foreground/70">
                  {selectedImage + 1} / {images.length}
                </span>
              </div>
            </div>
          </div>
        )}

        {/* Call to Action */}
        <div
          className={`text-center transition-all duration-800 delay-800 ${
            isVisible ? "animate-fade-in-up" : "opacity-0"
          }`}
        >
          <div className="glass-panel p-8 max-w-2xl mx-auto">
            <p className="text-body text-foreground/80 mb-6">
              Cada imagen cuenta una historia. Cada historia merece protección.
            </p>
            <p className="text-body-large text-foreground font-medium">
              Tu&Tu: La primera línea de defensa digital
            </p>
          </div>
        </div>
      </div>
    </section>
  );
};
