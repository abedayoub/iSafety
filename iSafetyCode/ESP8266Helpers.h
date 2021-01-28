#define DHTTYPE DHT11
const int flame = D0;
int Gas_analog = A0;    // used for ESP8266
int Gas_digital = D2;   // used for ESP8266
typedef enum {
//    ONBOARD_LED         = 16,
    DIGITAL_PIN1        =  12,
    DIGITAL_PIN2        =  4,
    DIGITAL_PIN3        =  0,
    DIGITAL_PIN4        =  2,

    DIGITAL_PIN7        = 13,
} gpio_pins;
